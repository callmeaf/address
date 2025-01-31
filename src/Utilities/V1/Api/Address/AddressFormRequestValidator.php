<?php

namespace Callmeaf\Address\Utilities\V1\Api\Address;

use Callmeaf\Base\Utilities\V1\FormRequestValidator;

class AddressFormRequestValidator extends FormRequestValidator
{
    public function index(): array
    {
        return [
            'full_name' => false,
            'mobile' => false,
            'is_default' => false,
            'national_code' => false,
            'postal_code' => false,
            'address' => false,
        ];
    }

    public function store(): array
    {
        $rules = [
            'status' => true,
            'type' => true,
            'is_default' => false,
            'province_id' => true,
            'full_name' => false,
            'mobile' => false,
            'email' => false,
            'national_code' => false,
            'postal_code' => false,
            'address' => true,
        ];

        if(authUser(request: $this->request)?->isSuperAdminOrAdmin()) {
            $rules['user_id'] = true;
        }

        return $rules;
    }

    public function show(): array
    {
        return [];
    }

    public function update(): array
    {
        $rules = [
            'status' => true,
            'type' => true,
            'is_default' => false,
            'province_id' => true,
            'full_name' => false,
            'mobile' => false,
            'email' => false,
            'national_code' => false,
            'postal_code' => false,
            'address' => true,
        ];

        if(authUser(request: $this->request)?->isSuperAdminOrAdmin()) {
            $rules['user_id'] = true;
        }

        return $rules;
    }

    public function statusUpdate(): array
    {
        return [
            'status' => true,
        ];
    }

    public function destroy(): array
    {
        return [];
    }

}
