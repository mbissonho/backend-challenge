<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Arr;
use Tests\TestCase;

class RegisterUserTest extends TestCase
{

    public function test_user_can_be_registered_with_valid_data()
    {
        //Act

        $userData = [
            'name' => 'John Doe',
            'email' => 'johndoe@mail.com',
            'password' => '12345678',
            'password_confirmation' => '12345678',
            'msisdn' => '+5531999999999',
            'access_level' => User::ACCESS_LEVEL_PRO
        ];

        $response = $this->postJson(route('api.v1.users.store'), $userData);

        //Assert

        $response->assertCreated();
        $this->assertDatabaseHas('users', Arr::except($userData , ['password_confirmation', 'password']));

    }
}
