<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;
use Tests\UserTestTrait;

class SearchTest extends TestCase
{
    use WithFaker, UserTestTrait;

    public function test_search_a_word()
    {
        $payload = [
            'keyword' => $this->faker->word(),
        ];

        $this->post('api/auth/search/book', $payload, [
            'Authorization' => $this->Login(),
        ])->assertStatus(Response::HTTP_OK);
    }
}
