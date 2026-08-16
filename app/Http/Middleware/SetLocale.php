<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;

/**
 * Locale is decided by the URL, never by the visitor.
 *
 *     /about      -> English
 *     /ar/about   -> Arabic
 *
 * That is the whole point: a cookie- or header-driven locale means one URL
 * serves two languages, so Googlebot (which does not send Accept-Language: ar)
 * can only ever index one of them. With the prefix, both are real pages.
 *
 * URL::defaults() then makes every route('about') in a Blade template resolve
 * to the current language automatically, so no template needed changing.
 *
 * Geo/Accept-Language detection survives, but only as a one-time suggestion for
 * first-time human visitors — it redirects them to the Arabic mirror rather than
 * swapping the content underneath a stable URL. Crawlers are never redirected.
 */
class SetLocale
{
    private const SUPPORTED = ['en', 'ar'];

    /** Arab League country codes (used for the first-visit suggestion only). */
    private const ARAB_COUNTRIES = [
        'EG', 'SA', 'AE', 'QA', 'KW', 'BH', 'OM', 'YE', 'JO', 'LB',
        'SY', 'IQ', 'PS', 'LY', 'TN', 'DZ', 'MA', 'SD', 'MR', 'SO',
        'DJ', 'KM',
    ];

    /**
     * Anything that looks like a crawler is pinned to the URL it asked for.
     * A bot bounced to a different language sees redirects instead of content.
     */
    private const BOT_PATTERN = '/bot|crawl|spider|slurp|bingpreview|facebookexternalhit|'
        . 'embedly|quora link preview|showyoubot|outbrain|pinterest|whatsapp|telegram|'
        . 'skypeuripreview|vkshare|w3c_validator|lighthouse|gtmetrix|pingdom|ahrefs|'
        . 'semrush|mj12|dotbot|petalbot|yandex|duckduck|baidu|applebot|gptbot|'
        . 'claudebot|perplexity|ccbot|chatgpt/i';

    public function handle(Request $request, Closure $next)
    {
        // The URL is the single source of truth. routes/web.php registers the matching
        // tree from this same prefix, so generated links stay in-language on their own.
        $locale = self::localeFromPath($request->getPathInfo());

        App::setLocale($locale);

        if ($redirect = $this->firstVisitSuggestion($request, $locale)) {
            return $redirect;
        }

        // Remember the language actually being viewed so the suggestion fires once.
        if ($request->cookie('site_locale') !== $locale) {
            cookie()->queue(cookie('site_locale', $locale, 60 * 24 * 365, '/', null, false, false));
        }

        return $next($request);
    }

    /**
     * On a visitor's very first GET, if everything points to Arabic but they landed
     * on an English URL, send them to the Arabic mirror once. Returns null in every
     * other case — including for bots, non-GET requests, and repeat visitors.
     */
    private function firstVisitSuggestion(Request $request, string $locale): ?\Symfony\Component\HttpFoundation\Response
    {
        if ($locale !== 'en') return null;
        if (!$request->isMethod('GET')) return null;
        if ($request->cookie('site_locale')) return null;
        if ($this->isBot($request)) return null;
        if ($this->detectPreferredLocale($request) !== 'ar') return null;

        $target = self::toLocale($request->getRequestUri(), 'ar');
        if ($target === null) return null;

        return redirect($target, 302)
            ->withCookie(cookie('site_locale', 'ar', 60 * 24 * 365, '/', null, false, false));
    }

    private function isBot(Request $request): bool
    {
        return (bool) preg_match(self::BOT_PATTERN, (string) $request->userAgent());
    }

    /** 'ar' when the path sits under the /ar tree, otherwise 'en'. */
    public static function localeFromPath(string $path): string
    {
        $path = '/' . ltrim($path, '/');
        return ($path === '/ar' || str_starts_with($path, '/ar/')) ? 'ar' : 'en';
    }

    /**
     * Translate a request URI between the two language trees.
     * '/about' <-> '/ar/about', '/' <-> '/ar'. Returns null if unmapped.
     */
    public static function toLocale(string $uri, string $target): ?string
    {
        if (!in_array($target, self::SUPPORTED, true)) return null;

        // Split off the query string so it survives the swap.
        $query = '';
        if (($pos = strpos($uri, '?')) !== false) {
            $query = substr($uri, $pos);
            $uri = substr($uri, 0, $pos);
        }

        $path = '/' . ltrim($uri, '/');
        $isArabic = $path === '/ar' || str_starts_with($path, '/ar/');
        $bare = $isArabic ? (substr($path, 3) ?: '/') : $path;
        $bare = '/' . ltrim($bare, '/');

        $result = $target === 'ar'
            ? ($bare === '/' ? '/ar' : '/ar' . $bare)
            : $bare;

        return $result . $query;
    }

    /** GeoIP header first, then Accept-Language, then English. */
    private function detectPreferredLocale(Request $request): string
    {
        $country = $request->header('CF-IPCountry') ?? $request->header('X-Country-Code');
        if ($country && in_array(strtoupper($country), self::ARAB_COUNTRIES, true)) {
            return 'ar';
        }

        $accept = (string) $request->header('Accept-Language', '');
        if ($accept !== '') {
            $primary = strtolower(trim(explode(',', $accept)[0]));
            if (str_starts_with($primary, 'ar')) {
                return 'ar';
            }
        }

        return 'en';
    }
}
