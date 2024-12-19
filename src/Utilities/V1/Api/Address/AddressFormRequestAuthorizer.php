<?php

namespace Callmeaf\Address\Utilities\V1\Api\Address;

use Callmeaf\Base\Utilities\V1\FormRequestAuthorizer;
use Callmeaf\Permission\Enums\PermissionName;

class AddressFormRequestAuthorizer extends FormRequestAuthorizer
{
    public function index(): bool
    {
        return true;
    }

    public function create(): bool
    {
        return userCan(PermissionName::ADDRESS_STORE);
    }

    public function store(): bool
    {
        return userCan(PermissionName::ADDRESS_STORE);
    }

    public function show(): bool
    {
        return true;
    }

    public function edit(): bool
    {
        return userCan(PermissionName::ADDRESS_UPDATE);
    }

    public function update(): bool
    {
        return userCan(PermissionName::ADDRESS_UPDATE);
    }

    public function statusUpdate(): bool
    {
        return userCan(PermissionName::ADDRESS_UPDATE);
    }

    public function destroy(): bool
    {
        return userCan(PermissionName::ADDRESS_DESTROY);
    }

    public function imageUpdate(): bool
    {
        return userCan(PermissionName::ADDRESS_STORE);
    }
}
