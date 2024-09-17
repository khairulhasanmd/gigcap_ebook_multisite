<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\CheckValidEmail;
use App\Rules\StrengthPassword;

class RegistrationUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return match($this->method()){
            'POST' => $this->checkRules(),
            'GET' => $this->view(),
        };
    }

    /**
     * Check Rules
     *
     * @return array
     */
    public function checkRules()
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => ['required','unique:users,email,NULL,id,deleted_at,NULL', new CheckValidEmail],
            'password' => ['required', new StrengthPassword],
            'gCaptcha' => isRecaptchaActive() ? 'required|captcha' : 'nullable'
        ];
    }

    /**
     * Check view
     *
     * @return array
     */
    public function view()
    {
        return [

        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge(['gCaptcha' => $this['g-recaptcha-response']]);
    }
}
