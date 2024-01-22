<?php

declare(strict_types=1);

namespace Src\Context\Site\Application;

use Src\Context\Site\Domain\Contracts\SiteContract;

final class SearchGamesUseCase
{
    private $repository;

    public function __construct(SiteContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(string $url)
    {
        $siteUrl = new SiteUrl($url);
        $site = new Site($siteUrl);
        return $this->repository->createShortUrl($site);
    }
}