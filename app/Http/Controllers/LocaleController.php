<?php

namespace App\Http\Controllers;

use App\Http\Middleware\SetLocale;
use Illuminate\Http\Request;

class LocaleController extends Controller
{
    /**
     * Switch language by moving the visitor to the same page in the other URL tree
     * (/about <-> /ar/about) rather than by changing what a single URL renders.
     */
    public function switch(Request $request, string $locale)
    {
        $locale = in_array($locale, ['en', 'ar'], true) ? $locale : 'en';

        $target = SetLocale::toLocale($this->currentPath($request), $locale) ?? '/';

        return redirect($target)
            ->withCookie(cookie('site_locale', $locale, 60 * 24 * 365, '/', null, false, false));
    }

    /**
     * The path the visitor was on, taken from the referer. Only same-host referers
     * are trusted so this cannot be used as an open redirect.
     */
    private function currentPath(Request $request): string
    {
        $referer = (string) $request->headers->get('referer', '');
        if ($referer === '') {
            return '/';
        }

        $parts = parse_url($referer);
        if (!isset($parts['host']) || strcasecmp($parts['host'], $request->getHost()) !== 0) {
            return '/';
        }

        return ($parts['path'] ?? '/') . (isset($parts['query']) ? '?' . $parts['query'] : '');
    }
}
