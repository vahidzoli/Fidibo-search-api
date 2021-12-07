<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;
use Tests\UserTestTrait;

class SearchControllerTest extends TestCase
{
    use WithFaker, UserTestTrait;

    public function test_search_keyword()
    {
        $payload = [
            'keyword' => 'صادق هدایت',
        ];


        $this->post('api/auth/search/book', $payload, [
            'Authorization' => $this->Login(),
        ])
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure([
                "status_code",
                'data' => [
                    '*' => [
                        'image_name',
                        'id',
                        'title',
                        'content',
                        'slug',
                        'publishers' => [
                            'title'
                        ],
                        'authors' => [
                            '*' => [
                                'name'
                            ]
                        ]
                    ]
                ]
            ]);
    }
}
