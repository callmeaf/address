<?php

return [
    'model' => \Callmeaf\Address\Models\Address::class,
    'model_resource' => \Callmeaf\Address\Http\Resources\V1\Api\AddressResource::class,
    'model_resource_collection' => \Callmeaf\Address\Http\Resources\V1\Api\AddressCollection::class,
    'service' => \Callmeaf\Address\Services\V1\AddressService::class,
    'default_values' => [
        'status' => \Callmeaf\Address\Enums\AddressStatus::ACTIVE,
        'is_default' => false,
    ],
    'events' => [
        \Callmeaf\Address\Events\AddressIndexed::class => [
            // listeners
        ],
        \Callmeaf\Address\Events\AddressStored::class => [
            // listeners
        ],
        \Callmeaf\Address\Events\AddressShowed::class => [
            // listeners
        ],
        \Callmeaf\Address\Events\AddressUpdated::class => [
            // listeners
        ],
        \Callmeaf\Address\Events\AddressStatusUpdated::class => [
            // listeners
        ],
        \Callmeaf\Address\Events\AddressDestroyed::class => [
            // listeners
        ],
    ],
    'validations' => [
        'address' => \Callmeaf\Address\Utilities\V1\Api\Address\AddressFormRequestValidator::class,
    ],
    'resources' => [
        'address' => \Callmeaf\Address\Utilities\V1\Api\Address\AddressResources::class,
    ],
    'controllers' => [
        'addresses' => \Callmeaf\Address\Http\Controllers\V1\Api\AddressController::class,
    ],
    'form_request_authorizers' => [
        'address' => \Callmeaf\Address\Utilities\V1\Api\Address\AddressFormRequestAuthorizer::class,
    ],
    'middlewares' => [
        'address' => \Callmeaf\Address\Utilities\V1\Api\Address\AddressControllerMiddleware::class,
    ],
    'searcher' => \Callmeaf\Address\Utilities\V1\Api\Address\AddressSearcher::class,
];
