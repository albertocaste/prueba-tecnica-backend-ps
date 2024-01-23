<?php

declare(strict_types=1);

namespace Src\Context\Site\Domain;

use Src\Context\Site\Domain\ValueObjects\SiteUrl;
use Src\Context\Site\Domain\ValueObjects\SiteShortUrl;

final class Site
{
    private SiteUrl $url;
    private ?SiteShortUrl $shortUrl = null;

    public function __construct(
        SiteUrl $url,
        ?SiteShortUrl $shortUrl = null
    )
    {
        $this->url = $url;
        $this->shortUrl = $shortUrl;

    }

    public function url(): SiteUrl
    {
        return $this->url;
    }

    public function shortUrl(): ?SiteShortUrl
    {
        return $this->shortUrl;
    }

    public function updateShortUrl(SiteShortUrl $shortUrl): void
    {
        $this->shortUrl = $shortUrl;
    }

}