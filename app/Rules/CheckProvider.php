<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CheckProvider implements Rule
{
    protected $providerName;

    public function __construct($providerName)
    {
        $this->providerName = $providerName;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (!is_array($value)) {
            return false;
        }

        // Check if at least one key has a value of "1"
        return collect($value)->contains('1');
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('Please make sure that at least one :x provider is currently active.', ['x' => $this->providerName]);
    }
}
