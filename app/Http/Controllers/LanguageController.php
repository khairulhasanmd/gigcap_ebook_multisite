<?php
/**
 * @package LanguageController
 * @author TechVillage <support@techvill.org>
 * @contributor Sakawat Hossain Rony <[sakawat.techvill@gmail.com]>
 * @created 26-05-2021
 */
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Language\StoreLanguageRequest;
use App\Models\Language;
use App\Services\LanguageService;
use Illuminate\Http\Request;
use DB;

class LanguageController extends Controller
{
    private $service;

    /**
     * Constructor for Language
     *
     * @param LanguageService $service
     * @return void
     */
    public function __construct(LanguageService $service)
    {
        $this->service = $service;
    }

    /**
     * Language list
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $data['list_menu']         = 'language';
        $data['languageList']      = Language::getAll();
        $data['languagesImgPath']  = 'uploads/flags';
        $data['languageShortName'] = getShortLanguageName(false, $data['languageList']);

        return view('admin.language.index', $data);
    }

    /**
     * Translation
     *
     * @param int $id
     * @return array
     */
    public function translation(int $id)
    {
        $data = $this->service->editTranslation($id);
        $data['list_menu']  = 'language';

        if ($data['status'] == 'fail') {
            return to_route('language.index')->withFail($data['message']);
        }

        return view('admin.language.translation', $data);
    }

    /**
     * Store Language
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(StoreLanguageRequest $request)
    {
        $response = $this->service->store($request->all());
        $this->setSessionValue($response);

        if ($response['status'] == 'fail') {
            return back();
        }

        return to_route('language.translation', $response['languageId']);
    }

    /**
     * Edit Language
     *
     * @param int $id
     */
    public function edit(int $id)
    {
        $language = Language::getAll()->where('id',$id)->first();
        $language['flag'] = url("datta-able/fonts/flag/flags/4x3/". getSVGFlag($language->short_name) .".svg");

        return $language;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        if ($request->edit_default == 'on' && $request->edit_status == 'Inactive') {
            return back()->withFail(__("Default language can't be inactive."));
        }

        $response  = [];
        $response  = $this->messageArray(__('Update Failed'), 'fail');
        $validator = Language::updateValidation($request->all());
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();
        try {
            $languageInfo = Language::getAll()->where('id', $request->language_id)->first();
            if (!empty($languageInfo)) {
                $request['direction'] = $request->edit_direction;
                $request['default']   = $request->edit_default;
                $request['status']    = $request->edit_status;

                if (is_null($request->edit_default) && $languageInfo->is_default) {
                    return back()->withFail(__("This action can not be performed, you can choose another language to make default."));
                }

                if (isset($request['default']) && $request['default'] === "on") {
                    $request['is_default'] = 1;
                    $request['status']     = "Active";
                } else {
                    $request['is_default'] = 0;
                }

                if ((new Language)->updateLanguage($request->only('direction', 'status', 'is_default'), $request->language_id)) {
                    $response = $this->messageArray(__('The :x has been successfully saved.', ['x' => __('Language')]), 'success');
                }
            }
            DB::commit();

        } catch (\Exception $e) {
            DB::rollBack();
            $response = $this->messageArray($e->getMessage(), 'fail');
        }
        $this->setSessionValue($response);
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $response = $this->service->delete($id);
        $this->setSessionValue($response);

        return redirect()->back();
    }

    /**
     * Store Translation
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function translationStore(Request $request)
    {
        if (!$request->key) {
            $response = $this->messageArray(__('The :x has been successfully saved.', ['x' => __('Language')]),'success');
            $this->setSessionValue($response);
            return back();
        }
        $response = [];
        if (!is_writable(base_path('resources/lang/'))) {
            $response = $this->messageArray(__('Need writable permission of language directory'), 'fail');
        }
        $language = Language::getAll()->where('id', $request->id)->first();
        $data = openJSONFile($language->short_name);
        foreach ($request->key as $key => $value) {
            if (is_array($value)) {
                foreach ($value as $secondKey => $secondValue) {
                    $data[$key][$secondKey] = $request->key[$key][$secondKey];
                }
            } else {
                $data[$key] = $request->key[$key];
            }
        }
        saveJSONFile($language->short_name, $data);
        $response = $this->messageArray(__('The :x has been successfully saved.', ['x' => __('Language')]),'success');
        $this->setSessionValue($response);
        return back();
    }
}
