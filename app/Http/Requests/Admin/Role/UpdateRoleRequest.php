<?php

namespace App\Http\Requests\Admin\Role;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoleRequest extends FormRequest
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
     * Require Rule
     *
     * @return string
     */
    private function requireRule()
    {
        if (in_array($this->slug, defaultRoles())) {
            return 'nullable';
        }

        return 'required';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:50',
            'slug' => 'required|unique:roles,slug,' . $this->id,
            'type' => $this->requireRule() . '|in:admin,user',
            'description' => 'nullable|max:200',
        ];
    }
}
