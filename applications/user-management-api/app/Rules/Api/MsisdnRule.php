<?php

namespace App\Rules\Api;

use Illuminate\Contracts\Validation\Rule;

class MsisdnRule implements Rule
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
        return preg_match('/^(?=^(?:tel\:)?(?:[+\ ()]*[0-9]){3,20}\ *$)(?:tel\:)?\ *\+?[0-9\ ]+(?:\([0-9]{1,3}\)[0-9\ ]+)?$/', $value) === 1;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Invalid msisdn';
    }
}
