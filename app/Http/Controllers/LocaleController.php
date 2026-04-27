<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocaleController extends Controller
{
    public function switch(Request $request, string $locale)
    {
        $allowed = ['en', 'ar'];
        if (!in_array($locale, $allowed, true)) {
            $locale = 'en';
        }

        // Persist choice in a 1-year cookie that survives sessions
        $back = $request->headers->get('referer', url('/'));

        return redirect($back)
            ->withCookie(cookie('site_locale', $locale, 60 * 24 * 365, '/', null, false, false));
    }
}
