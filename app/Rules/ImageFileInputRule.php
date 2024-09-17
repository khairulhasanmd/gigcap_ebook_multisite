<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ImageFileInputRule implements Rule
{
    protected $errorMessage;
    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $isImage = request('file');
        if (!$isImage) {
            return false;
        }

        if (!$this->checkFile($isImage)) {
            return false;
        }
        return true;
    }

    public function checkFile($value)
    {
        if (request()->input('provider') == 'clipdrop') {
            $service = request()->input('service');
            $data = config('openAI.clipdrop')['validation'];

            if (!$this->checkResolutionOrSize($data[$service]['resolution'], $data[$service]['size'], $value)) {
                return false;
            }
        }

        return true;
    }

    public function checkResolutionOrSize($resolution, $size, $value)
    {
        if (!empty($resolution) && !$this->checkResolution($resolution, $value)) {
            return false;
        }

        if (!empty($size) && !$this->checkSize($size, $value)) {
            return false;
        }

        return true;
    }

    public function checkResolution($resolution, $value)
    {
        list($width, $height) = getimagesize($value);
        $megapixels = ($width * $height) / 1000000;
        
        list($maxWidth, $maxHeight) = explode('x', $resolution, 2);
        $maxResolution = ($maxWidth * $maxHeight) / 1000000;

        if ($megapixels > $maxResolution) {
            $this->setMessage(str_replace('y', 'attribute', __('The :y must be an image with a resolution of :x pixel or smaller.', ['x' => $resolution])));
            return false;
        }

        return true;
    }

    public function checkSize($size, $value)
    {
        $sizeInMB = filesize($value) / 1024 / 1024;
        if ($sizeInMB > $size) {
            $this->setMessage(str_replace('y', 'attribute', __('The :y must be an image with a file size of :x MB or smaller.', ['x' => $size])));
            return false;
        }

        return true;
    }


    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->errorMessage;
    }

    public function setMessage($message)
    {
        $this->errorMessage = $message;
    }
}
