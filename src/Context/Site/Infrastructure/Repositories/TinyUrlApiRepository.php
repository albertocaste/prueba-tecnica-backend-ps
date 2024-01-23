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
    private $client;

    public function __construct()
    {
        $this->client = Http::withOptions([
            'verify' => false,
        ]);
    }

    public function check(): void
    {
        $response = $this->client->get($this->BASE_URL);
        $response->throw();
    }

    public function createShortUrl(?Site $site): ?Site
    {
        $response = $this->client->get($this->BASE_URL. 'api-create.php', [
            'url' => $site->url()->value()
        ]);
        $response->throw();
        $siteShortUrl = new SiteShortUrl($response->body());
        $site->updateShortUrl($siteShortUrl);
        return $site;
    }

}