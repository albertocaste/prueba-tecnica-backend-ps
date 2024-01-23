<?php

namespace Tests\Feature\Context\Site;

use Src\Context\Site\Infrastructure\Repositories\TinyUrlApiRepository;
use Tests\TestCase;

class TinyUrlApiIntegrationTest extends TestCase
{
    /**
     * Test tiny url api integration
     *
     * @return void
     */
    public function test_check_tiny_api_url_integration(): void
    {
        $tinyUrlApiRepository = new TinyUrlApiRepository();
        $tinyUrlApiRepository->check();
        $this->assertTrue(true);

    }
}
