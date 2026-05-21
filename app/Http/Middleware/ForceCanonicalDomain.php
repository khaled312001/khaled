<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Forces every request onto the single canonical host (https://khaledahmed.net)
 * with a single 301. Fixes Google Search Console duplication where the
 * www.khaledahmed.net variant was served with a 200 instead of redirecting
 * (the .htaccess rule never fired because the Hostinger `hcdn` proxy forwards
 * the origin request without the original www Host).
 *
 * Runs in PHP after TrustProxies, so getHost() reflects X-Forwarded-Host.
 */
class ForceCanonicalDomain
{
    private const CANONICAL_HOST = 'khaledahmed.net';

    public function handle(Request $request, Closure $next): Response
    {
        $host      = strtolower($request->getHost());
        $forwarded = strtolower((string) $request->header('X-Forwarded-Host'));

        // Any host that is the canonical domain WITH a leading label (e.g. "www.")
        // — but not the bare canonical host itself — must redirect.
        $isNonCanonical =
            ($host !== self::CANONICAL_HOST && str_ends_with($host, '.' . self::CANONICAL_HOST))
            || ($forwarded !== '' && $forwarded !== self::CANONICAL_HOST && str_ends_with($forwarded, '.' . self::CANONICAL_HOST));

        // Only redirect the www variant from this app — other subdomains
        // (quran., hotel., etc.) are separate sites and never reach this code.
        $isWww = str_starts_with($host, 'www.') || str_starts_with($forwarded, 'www.');

        if ($isNonCanonical && $isWww) {
            $target = 'https://' . self::CANONICAL_HOST . $request->getRequestUri();
            return redirect($target, 301)->header('Cache-Control', 'no-store, max-age=0');
        }

        return $next($request);
    }
}
