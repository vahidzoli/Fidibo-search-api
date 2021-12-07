<?php

namespace App\Services\Search;

use Illuminate\Cache\CacheManager;

class CachedSearchService implements SearchServiceInterface
{
    protected $service;
    protected $cache;

    const TTL = 600; # 10 minutes

    public function __construct(CacheManager $cache, FidiboSearchService $fidiboSearchService) {
        $this->service = $fidiboSearchService;
        $this->cache = $cache;
    }

    public function search(string $keyword = null)
    {
        return $this->cache->remember($keyword, self::TTL, function () use ($keyword) {
            return $this->service->search($keyword);
        });
    }
}