<?php

namespace App\Containers\AppSection\Authentication\UI\API\Controllers;

use App\Containers\AppSection\Authentication\Actions\LoginAction;
use App\Containers\AppSection\Authentication\UI\API\Requests\LoginRequest;
use Illuminate\Http\JsonResponse;
use App\Ship\Parents\Controllers\ApiController;
use App\Containers\AppSection\Authentication\UI\API\Transformers\TokenTransformer;

class LoginController extends ApiController
{
    public function __invoke(LoginRequest $request, LoginAction $action): JsonResponse
    {
        $result = $action->run($request);

        return $this->json($this->transform($result->token, TokenTransformer::class))->withCookie($result->refreshTokenCookie);
    }
}
