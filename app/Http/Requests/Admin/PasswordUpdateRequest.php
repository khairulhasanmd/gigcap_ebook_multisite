<?php

namespace App\Http\Requests\Admin;

use App\Rules\StrengthPassword;
use Illuminate\Foundation\Http\FormRequest;

class PasswordUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'password'    => ['required', new StrengthPassword],
            'confirm_password' => 'required|same:password',
            'send_mail' => 'nullable|in:on'
        ];
    }
}
