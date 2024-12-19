<?php

namespace Callmeaf\Address\Utilities\V1\Api\Address;

use Callmeaf\Base\Http\Controllers\BaseController;
use Callmeaf\Base\Utilities\V1\ControllerMiddleware;


class AddressControllerMiddleware extends ControllerMiddleware
{
    public function __invoke(BaseController $controller): void
    {
        $controller->middleware('auth:sanctum');
    }
}
