<?php

namespace App\Services;

use Illuminate\Support\Collection;

class FidiboSearchCollection
{
    private $data;

    function __construct($data)
    {
        $this->data = $data;
    }

    public function convert()
    {
        $collection = new Collection($this->data->json()['books']['hits']['hits']);

        return $collection->map(function($item) {
            return [
                'image_name' => $item['_source']['image_name'],
                'publishers' => $item['_source']['publishers'],
                'id'         => $item['_source']['id'],
                'title'      => $item['_source']['title'],
                'content'    => $item['_source']['content'],
                'slug'       => $item['_source']['slug'],
                'authors'    => $item['_source']['authors'],
            ];
        });
    }
}