<?php

namespace Tests\Unit\Context\Site;

use Tests\TestCase;
use Src\Context\Site\Application\CreateShortUrlUseCase;
use Src\Context\Site\Infrastructure\Repositories\TinyUrlApiRepository;

class CreateShortUrlUseCaseTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_create_short_url_by_url(): void
    {
        $url = 'http://www.example.com';
        $createShortUrlUseCase = new CreateShortUrlUseCase(new TinyUrlApiRepository());
        $urlSite = $createShortUrlUseCase->__invoke($url);
        $this->assertTrue(true, $urlSite->shortUrl()->value());
    }
}
