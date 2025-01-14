<?php

namespace Callmeaf\Address\Services\V1\Contracts;

use Callmeaf\Base\Services\V1\Contracts\BaseServiceInterface;
use Illuminate\Database\Eloquent\Model;

interface AddressServiceInterface extends BaseServiceInterface
{
    public function createAddressFor(Model $model,array $data = [],?array $events = []): self;
}
