<?php

declare(strict_types=1);

namespace Src\Context\Site\Infrastructure\Controllers;

use Illuminate\Http\Request;
use Src\Context\Site\Application\CreateShortUrlUseCase;
use Src\Context\Site\Domain\Site;
use Src\Context\Site\Infrastructure\Repositories\TinyUrlApiRepository;

final class CreateShortUrlController
{
    private $repository;

    public function __construct(TinyUrlApiRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(Request $request): Site
    {
        $url = $request->input('url');
        $createShortUrlUseCase = new CreateShortUrlUseCase($this->repository);
        return $createShortUrlUseCase->__invoke($url);
    }
}