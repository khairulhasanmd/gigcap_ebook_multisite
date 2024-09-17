<?php

namespace App\Http\Middleware;

use App;
use Closure;
use App\Models\Language;
use App\Models\Preference;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;


class Locale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $defaultLanguageCode = preference('dflt_lang') ?? 'ja';

        if (Auth::check()) {
            $langData = Cache::get(config('cache.prefix').'-user-language-'.Auth::id(), $defaultLanguageCode);
        } else {
            $langData = Cache::get(config('cache.prefix').'-guest-language-' . md5(request()->server('HTTP_USER_AGENT') . getIpAddress()), $defaultLanguageCode);
        }

        $language = Language::getAll()->where('short_name', $langData)->where('status', 'Active');

        if (empty($language) || count($language) == 0) {
            $language = Language::getAll()->where('is_default', '1')->where('status', 'Active');
            $langData = $language->first()->short_name;
        }

        if (!empty($language) && count($language) > 0) {
            App::setLocale($langData);
            $direction = !empty($language[4]['direction']) ? $language[4]['direction'] : 'ltr';
            Cache::put(config('cache.prefix') . '-language-direction', $direction, 600);
        } else {
            App::setLocale($langData);
            Cache::put(config('cache.prefix') . '-language-direction', 'ltr', 600);
        }

        return $next($request);
    }
}
