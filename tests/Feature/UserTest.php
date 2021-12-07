<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;
use Tests\UserTestTrait;

class UserTest extends TestCase
{
    use WithFaker, UserTestTrait;

    public function test_register_a_user()
    {
        $payload = [
            'name'      => $this->faker->name,
            'email'     => $this->faker->email,
            'password'  => '12345678',
            'password_confirmation' => '12345678'
        ];

        $this->post('api/auth/register', $payload)
            ->assertStatus(Response::HTTP_CREATED);
    }

    public function test_login_user()
    {
        $user = User::create(
            [
                'name'       => $this->faker->name,
                'email'      => $this->faker->email,
                'password'   => bcrypt('12345678')
            ]
        );

        $payload = [
            'email'     => $user->email,
            'password'  => '12345678',
        ];

        $this->post('api/auth/login', $payload)
            ->assertStatus(Response::HTTP_OK);
    }

    public function test_get_a_user_profile()
    {
        $this->get('api/auth/user-profile', [
            'Authorization' => $this->Login(),
        ])->assertStatus(Response::HTTP_OK);
    }

    public function test_logout_user()
    {
        $this->post('api/auth/logout', [
            'Authorization' => $this->Login(),
        ])->assertStatus(Response::HTTP_OK);
    }
}
