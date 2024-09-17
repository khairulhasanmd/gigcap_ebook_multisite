<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, Cache};
use Modules\CMS\Service\HomepageService;
use Modules\CMS\Http\Models\{
    Page,
};
use Modules\CMS\Entities\Page as HomePage;
use Modules\CMS\Entities\Component;

class SiteController extends Controller
{
    /**
     * Change Language function
     *
     * @param Request $request
     * @return bool
     */
    public function switchLanguage(Request $request): bool
    {
        if ($request->lang) {
            if (!empty(Auth::user()->id) && isset(Auth::guard('user')->user()->id)) {
                Cache::put(config('cache.prefix') . '-user-language-' . Auth::guard('user')->user()->id, $request->lang, 5 * 365 * 86400);
                return true;
            } else {
                Cache::put(config('cache.prefix') . '-guest-language-' . md5(request()->server('HTTP_USER_AGENT') . getIpAddress()), $request->lang, 5 * 365 * 86400);
                return true;
            }
        }

        return false;
    }

    /**
     * Pages
     *
     * @param  string  $slug
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function page($slug)
    {
        $data['page'] = Page::getAll()->where('slug', $slug)->where('status', 'Active')->first();

        if (isset($data['page'])) {
            if ($data['page']->type == 'home') {
                
                if (isActive('CMS')) {
                    $data['homeService'] = new HomepageService();
                    $data['page'] = HomePage::where('slug', $slug)->with(['components' => function ($q) {
                        $q->with(['properties', 'layout:id,file'])->orderBy('level', 'asc');
                    }])->first();
                    if ($data['page']) {
                        return view('site.home.index', $data);
                    }
                }
            }
            return view('site.pages.page', $data);
        }

        abort(404);
    }

    /**
     * Get Component Products
     *
     * @param  Request $request
     * @return [type]
     */
    public function getComponentProduct(Request $request)
    {
        if (!$request->get('component')) {
            return $this->notFoundResponse([], __('Invalid component'));
        }
        $data['displayPrice'] = preference('display_price_in_shop');
        $data['component'] = Component::whereId($request->get('component'))
            ->with(['layout:id,file', 'properties', 'page:id,layout'])->first();
        $data['homeService'] = new HomepageService();

        $html = view('cms::templates.blocks.sub.' . $data['component']->layout->file . '-data', $data)->render();

        return $this->successResponse(['html' => $html]);
    }
}
