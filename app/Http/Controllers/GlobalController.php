<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Concept;
use Illuminate\Http\Request;
use View, Config;

class GlobalController extends Controller
{

    protected $concept;
    protected $template;
    protected $asset;
    protected $domain;

    public function __construct()
    {
        $domain = url()->current();
        $this->domain = parse_url($domain)['host'];
        $this->concept = Concept::where('domain_name', $this->domain)->first();
        if(!$this->concept){
            // abort(404);
            // echo("this domain is not configured");
            return response()->json([
                'status'=> false,
                'message'=> "This domain is not configured",
                'errors'=> [],
                'data' =>[]
            ], 404);
        }
        // if(strlen(session()->get('locale')) < 1){
        //     $languages_available = [];
        //     foreach (Config::get('laravellocalization.supportedLocales') as $key => $value) {
        //         $languages_available[] = $key;
        //     }
        //     $locale = request()->getPreferredLanguage($languages_available);
        //     app()->setLocale($locale);
        //     session()->put('locale', $locale);
        // }
        $this->template = 'templates.'.$this->concept->template.'.';
        $this->asset = 'templates/'.$this->concept->template;
        View::share('concept', $this->concept);
        View::share('asset', $this->asset);
        View::share('template', $this->template);
    }

}
