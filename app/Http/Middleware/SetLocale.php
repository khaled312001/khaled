<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SetLocale
{
    /**
     * Arab League country codes (used for first-visit auto-locale).
     */
    private const ARAB_COUNTRIES = [
        'EG', 'SA', 'AE', 'QA', 'KW', 'BH', 'OM', 'YE', 'JO', 'LB',
        'SY', 'IQ', 'PS', 'LY', 'TN', 'DZ', 'MA', 'SD', 'MR', 'SO',
        'DJ', 'KM',
    ];

    public function handle(Request $request, Closure $next)
    {
        $locale = $request->cookie('site_locale');

        // First visit (no cookie) — auto-detect
        if (!$locale) {
            $locale = $this->detectLocale($request);
            // Persist the auto-detected locale so subsequent requests are stable
            cookie()->queue(cookie('site_locale', $locale, 60 * 24 * 365, '/', null, false, false));
        }

        if (!in_array($locale, ['en', 'ar'], true)) {
            $locale = 'en';
        }
        App::setLocale($locale);
        return $next($request);
    }

    /**
     * Auto-detect locale from (in order):
     *   1. CDN GeoIP header (CF-IPCountry, X-Country-Code) — most accurate
     *   2. Accept-Language HTTP header — universal browser hint
     *   3. Default to English
     */
    private function detectLocale(Request $request): string
    {
        // 1. GeoIP via CDN headers (Cloudflare etc.)
        $country = $request->header('CF-IPCountry')
            ?? $request->header('X-Country-Code')
            ?? null;
        if ($country && in_array(strtoupper($country), self::ARAB_COUNTRIES, true)) {
            return 'ar';
        }

        // 2. Accept-Language HTTP header
        $accept = $request->header('Accept-Language', '');
        if ($accept) {
            // Get the highest-priority language tag
            $primary = strtolower(trim(explode(',', $accept)[0]));
            if (str_starts_with($primary, 'ar')) {
                return 'ar';
            }
        }

        return 'en';
    }
}
