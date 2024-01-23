<?php

namespace App\Http\Controllers\Api\Site;

use App\Http\Controllers\Controller;
use App\Http\Resources\ShortUrlResource;
use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\Context\Site\Infrastructure\Controllers\CreateShortUrlController as HACreateShortUrlController;

class CreateShortUrlController extends Controller
{
    /**
     * @var \Src\Context\Site\Infrastructure\CreateShortUrlController
     */
    private $createShortUrlController;

    public function __construct(HACreateShortUrlController $createShortUrlController)
    {
        $this->createShortUrlController = $createShortUrlController;
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request) : JsonResponse
    {
        // TODO: Validate
        $shortUrl = new ShortUrlResource($this->createShortUrlController->__invoke($request));
        return response()->json($shortUrl, 200);
    }
}