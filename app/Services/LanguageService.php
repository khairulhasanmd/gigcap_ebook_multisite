<?php

/**
 * @package LanguageService
 * @author TechVillage <support@techvill.org>
 * @contributor Al Mamun <[almamun.techvill@gmail.com]>
 * @created 09-03-23
 */

namespace App\Services;

use App\Models\{
    Language, Preference
};

use App\Traits\MessageResponseTrait;
use Modules\OpenAI\Entities\ContentTypeMeta;

class LanguageService
{
    use MessageResponseTrait;

    /**
     * Service
     */
    public string|null $service;

    /**
     * Initialize
     *
     * @param string $service
     * @return void
     */
    public function __construct($service = null)
    {
        $this->service = $service;

        if (is_null($service)) {
            $this->service = __('Language');
        }
    }

    /**
     * Update Default Language
     *
     * @param string $shortName
     * @return void
     */
    private function updateDefaultLanguage(string $shortName): void
    {
        Preference::where('category', 'company')
            ->where('field', 'dflt_lang')
            ->update(['value' => $shortName]);

        Preference::forgetCache();
    }

    /**
     * Store Language
     *
     * @param array $data
     * @return array
     */
    public function store(array $data): array
    {
        if (!is_writable(base_path('resources/lang/'))) {
            return ['status' => 'fail', 'message' => __('Need writable permission of language directory')];
        }

        $languages  = getShortLanguageName(true);
        if (!in_array(strtolower($data['language_name']), array_keys($languages))) {
            return $this->notFoundResponse();
        }

        $data['name'] = $languages[strtolower($data['language_name'])];
        $data['short_name'] = strtolower($data['language_name']);
        $data['is_default'] = 0;

        if (isset($data['default']) && $data['default'] === "on") {
            Language::where('is_default', 1)->update(['is_default' => 0]);
            $this->updateDefaultLanguage($data['short_name']);

            $data['is_default'] = 1;
            $data['status']     = "Active";
        }

        if ($language = Language::create($data)) {
            Language::forgetCache();

            return $this->saveSuccessResponse() + ['languageId' => $language->id];
        }

        return $this->saveFailResponse();
    }

    /**
     * Delete Language
     *
     * @param int $id
     * @return array
     */
    public function delete(int $id): array
    {
        $language = Language::getAll()->where('id', $id)->first();

        if (empty($language)) {
            return $this->notFoundResponse();
        }

        if ($language->short_name == 'en') {
            return ['status' => 'fail', 'message' => __(':x language can not be deleted.', ['x' => __('English')])];
        }

        if (preference('dflt_lang') == $language->short_name) {
            return ['status' => 'fail', 'message' => __(':x language can not be deleted.', ['x' => __('Default')])];
        }


        $contentMeta = ContentTypeMeta::where('name', 'document')->where('key', 'language')->value('value');
        $contentMetaArray = json_decode($contentMeta, true);

        if (in_array($language->name, $contentMetaArray)) {
            $updatedContentMetaArray = array_diff($contentMetaArray, [$language->name]);

            ContentTypeMeta::where('name', 'document')->where('key', 'language')->update(['value' => json_encode($updatedContentMetaArray)]);
        }



        if ($language->delete()) {
            Language::forgetCache();

            return $this->deleteSuccessResponse();
        }

        return $this->saveFailResponse();
    }

    /**
     * Edit translation
     *
     * @param int $id
     * @return array
     */
    public function editTranslation(int $id): array
    {
        $data['language'] = $language = Language::getAll()->where('id', $id)->first();

        if (empty($language)) {
            return $this->notFoundResponse();
        }

        try {
            updateLanguageFile($language->short_name);
            $data['jsonData'] = openJSONFile($language->short_name);
        } catch (\Exception $e) {
            return ['status' => 'fail', 'message' => __('Need writable permission of language directory.')];
        }

        return $this->saveSuccessResponse() + $data;
    }
}
