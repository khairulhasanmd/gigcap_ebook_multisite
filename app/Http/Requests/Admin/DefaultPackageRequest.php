<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Subscription\Rules\DecimalValidator;
use Illuminate\Validation\Rule;

class DefaultPackageRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules =  [
            'code' => 'required|min:3|max:45',
            'price' => ['nullable', new DecimalValidator],
            'sort_order' => 'required|numeric',
            'status' => 'required|in:Active,Inactive',
            'is_default_package' => 'min:1|max:2',
            'features.*' => 'required|numeric',
            'name' => [
                Rule::requiredIf($this->input('is_default_package') == 1), 'max:191'
            ],
            'type' => 'required',
        ];
        return $rules;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
