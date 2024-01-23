<?php

namespace Tests\Feature\Context\Site;

use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class CreateShortUrlTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_create_short_url_e2e(): void
    {
        $response = $this->withHeaders([
            'Authorization' => 'Bearer []{}()',
        ])->post('/api/v1/short-urls', [
            'url' => 'https://example.com'
        ]);
        $response
            ->assertStatus(200)
            ->assertJson(fn (AssertableJson $json) =>
            $json->whereType('url', 'string')
        );
    }
}
