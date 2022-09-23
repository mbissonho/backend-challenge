<?php

namespace App\Http\Requests;

use App\Http\Requests\Api\AbstractApiRequest;
use App\Rules\Api\AccessLevelRule;
use App\Rules\Api\MsisdnRule;
use Illuminate\Validation\Rules\Password;

class RegisterUserRequest extends AbstractApiRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
                'string',
                'max:100'
            ],
            'email' => 'required|string|email|max:50|unique:users,email',
            'password' => [
                'required', 'string', 'max:50', 'confirmed',
                Password::min(8),
            ],
            'msisdn' => ['required', new MsisdnRule()],
            'access_level' => ['required', new AccessLevelRule()]
        ];
    }
}
