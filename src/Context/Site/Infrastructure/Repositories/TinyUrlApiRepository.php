<?php

declare(strict_types=1);

namespace Src\Context\Site\Infrastructure\Repositories;

use Src\Context\Site\Domain\Contracts\SiteRepositoryContract;
use Src\Context\Site\Domain\Site;
use Src\Context\Site\Domain\ValueObjects\SiteShortUrl;

final class TinyUrlApiRepository implements SiteRepositoryContract
{
    private string $BASE_URL = 'https://tinyurl.com/';

    public function __construct()
    {

    }

    public function createShortUrl(?Site $site): ?Site
    {
        $siteShortUrl = new SiteShortUrl('shortUrl');
        $site->updateShortUrl($siteShortUrl);
        return $site;
    }

}