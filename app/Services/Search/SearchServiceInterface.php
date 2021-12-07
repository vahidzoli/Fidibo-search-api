<?php

namespace App\Services\Search;

interface SearchServiceInterface
{
    /**
     * Search among books
     *
     * @param string $keyword
     */
    public function search(string $keyword = null);
}