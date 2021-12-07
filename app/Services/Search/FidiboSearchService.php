<?php

namespace App\Services\Search;

use App\Services\FidiboSearchCollection;
use Illuminate\Support\Facades\Http;

class FidiboSearchService implements SearchServiceInterface
{

    public function search(string $keyword = null)
    {
        $response = $this->fidiboSearchAdapter($keyword);

        $collect = new FidiboSearchCollection($response);

        return $collect->convert();
    }

    private function fidiboSearchAdapter(string $keyword = null)
    {
        return Http::asForm()->post('https://search.fidibo.com', [
            'q' => ($keyword === null ? "":$keyword),
        ]);
    }

}