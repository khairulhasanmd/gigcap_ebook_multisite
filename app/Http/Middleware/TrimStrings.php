<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\TrimStrings as Middleware;
use Illuminate\Http\Request;

class TrimStrings extends Middleware
{
    /**
     * The names of the attributes that should not be trimmed.
     *
     * @var array
     */
    protected $except = [
        'password',
        'password_confirmation',
        'body',
        'category',
        'html',
        'css',
        'content',
        'gdpr_external_script'
    ];

    /**
     * The names of the attributes that should not be striped.
     *
     * @var array
     */
    protected $exceptAllowHTMLTags = [
        'password',
        'password_confirmation',
        'body',
        'description',
        'html',
        'css',
        'message',
        'data',
        'title_text',
        'sub_title_text',
        'description_title_text',
        'content',
        'gdpr_external_script'
    ];


    /**
     * Transform the given value into striped value.
     *
     * @param  Request  $request
     * @return striped request input
     */
    public function __construct(Request $request)
    {
        $urlSegments = $request->segments();

        foreach ($urlSegments as $key => $value) {
            if ($value != strip_tags($value)) {
                if (in_array('api', array_values($urlSegments))) {
                    $data['status']  = ['code' => 400, 'text' => __('Bad Request')];
                    $data['message'] = __('Invalid characters are present in your api URL.');
                    /** Please don't remove the dd() method below. It is necessary to send error
                    messsage on invalid URL segments. */
                    dd(json_encode($data));
                }
                return redirect('dashboard');
            }
        }

        if ($request->isMethod('post') || $request->isMethod('put')) {
            
            $requestAll = $request->all();
            $data = [];
            $this->recursiveConvert($data, $requestAll);
            $request->replace($data);
        }
    }

    /**
     * iterateInputValue method
     * @param string $key
     * @param  array $value
     * @return array
     */
    private function iterateInputValue($key, $value)
    {
        if (!in_array($key, $this->except, true)) {
            $value = trim(xss_clean($value));
        }
        if (!empty($value) && !in_array($key, $this->exceptAllowHTMLTags, true)) {
            return stripBeforeSave($value);
        }
        return $value;
    }

    /**
     * RecursiveConvert method
     * @param array $key
     * @param  array $value
     * @return void
     */
    private function recursiveConvert(&$data, $array)
    {
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $this->recursiveConvert($data[$key], $value);
            } else {
                $data[$key] = $this->iterateInputValue($key, $value);
            }
        }
    }
}
