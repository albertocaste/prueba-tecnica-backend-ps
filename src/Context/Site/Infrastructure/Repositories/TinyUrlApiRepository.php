<?php

declare(strict_types=1);

namespace Src\Context\Site\Infrastructure\Repositories;

use Src\Context\Site\Domain\Contracts\SiteRepositoryContract;
use Src\Context\Site\Domain\Site;
use Src\Context\Site\Domain\ValueObjects\SiteShortUrl;
use Illuminate\Support\Facades\Http;

final class TinyUrlApiRepository implements SiteRepositoryContract
{
    private string $BASE_URL = 'https://tinyurl.com/';

    public function __construct()
    {

    }

    public function check(): void
    {
        $response = Http::get('http://example.com');
        $response->throw();
    }

    public function createShortUrl(?Site $site): ?Site
    {
        $siteShortUrl = new SiteShortUrl('shortUrl');
        $site->updateShortUrl($siteShortUrl);
        return $site;
    }

}