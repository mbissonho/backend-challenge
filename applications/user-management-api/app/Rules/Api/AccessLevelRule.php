<?php

namespace App\Rules\Api;

use App\Models\User;
use Illuminate\Contracts\Validation\Rule;

class AccessLevelRule implements Rule
{

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return in_array($value, User::ACCESS_LEVEL_OPTIONS);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Invalid access level';
    }
}
