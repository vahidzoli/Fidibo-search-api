<?php
namespace Tests;

use App\Models\User;
use Illuminate\Http\Response;

trait UserTestTrait {

    protected function Login()
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

        $response = $this->post('api/auth/login', $payload)
            ->assertStatus(Response::HTTP_OK);



        return $response->getOriginalContent()['token_type'] . ' ' .
            $response->getOriginalContent()['access_token'];
    }

}