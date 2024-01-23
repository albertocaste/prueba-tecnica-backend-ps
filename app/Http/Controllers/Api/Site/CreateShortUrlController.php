<?php

namespace App\Http\Controllers\Api\Site;

use App\Http\Controllers\Controller;
use App\Http\Resources\ShortUrlResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Src\Context\Site\Infrastructure\Controllers\CreateShortUrlController as HACreateShortUrlController;

class CreateShortUrlController extends Controller
{
    /**
     * @var CreateShortUrlController
     */
    private $createShortUrlController;

    /**
     * Construct
     *
     * @param HACreateShortUrlController $createShortUrlController
     */
    public function __construct(HACreateShortUrlController $createShortUrlController)
    {
        $this->createShortUrlController = $createShortUrlController;
    }

    /**
     * Handle the incoming request
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request) : JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'url' => 'required|url:http,https|string|max:255'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        }
        $shortUrl = new ShortUrlResource($this->createShortUrlController->__invoke($request));
        return response()->json($shortUrl, 200);
    }
}