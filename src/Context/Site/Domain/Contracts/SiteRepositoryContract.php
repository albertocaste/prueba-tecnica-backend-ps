<?php

declare(strict_types=1);

namespace Src\Context\Site\Domain\Contracts;

use Src\Context\Site\Domain\Site;

interface SiteRepositoryContract
{
    public function createShortUrl(?Site $site): ?Site;
}