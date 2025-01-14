<?php

namespace Callmeaf\Address\Utilities\V1\Api\Address;

use Callmeaf\Base\Utilities\V1\Resources;

class AddressResources extends Resources
{
    public function index(): self
    {
        $this->data = [
            'relations' => [
                'addressable',
                'province',
            ],
            'columns' => [
                'id',
                'status',
                'type',
                'addressable_id',
                'addressable_type',
                'province_id',
                'full_name',
                'mobile',
                'is_default',
                'created_at',
                'updated_at',
            ],
            'attributes' => [
                'id',
                'status',
                'status_text',
                'type',
                'type_text',
                'addressable_id',
                'addressable_type',
                'province_id',
                'full_name',
                'mobile',
                'is_default',
                'created_at_text',
                'updated_at_text',
                'addressable',
                '!addressable' => [
                    config('callmeaf-user.model') => [
                        'id',
                        'type',
                        'first_name',
                        'last_name',
                    ],
                ],
                'province',
                '!province' => [
                    'id',
                    'name',
                ],
            ],
        ];
        return $this;
    }

    public function store(): self
    {
        $this->data = [
            'relations' => [],
            'attributes' => [
                'id',
                'status',
                'status_text',
                'type',
                'type_text',
                'addressable_id',
                'addressable_type',
                'province_id',
                'full_name',
                'mobile',
                'email',
                'is_default',
                'postal_code',
                'national_code',
                'address',
                'created_at_text',
                'updated_at_text',
            ],
        ];
        return $this;
    }

    public function show(): self
    {
        $this->data = [
            'relations' => [],
            'attributes' => [
                'id',
                'status',
                'status_text',
                'type',
                'type_text',
                'addressable_id',
                'addressable_type',
                'province_id',
                'full_name',
                'mobile',
                'email',
                'is_default',
                'postal_code',
                'national_code',
                'address',
                'created_at_text',
                'updated_at_text',
            ],
        ];
        return $this;
    }

    public function update(): self
    {
        $this->data = [
            'relations' => [],
            'attributes' => [
                'id',
                'status',
                'status_text',
                'type',
                'type_text',
                'addressable_id',
                'addressable_type',
                'province_id',
                'full_name',
                'mobile',
                'email',
                'is_default',
                'postal_code',
                'national_code',
                'address',
                'created_at_text',
                'updated_at_text',
            ],
        ];
        return $this;
    }

    public function statusUpdate(): self
    {
        $this->data = [
            'relations' => [],
            'attributes' => [
                'id',
                'status',
                'status_text',
                'type',
                'type_text',
                'addressable_id',
                'addressable_type',
                'province_id',
                'full_name',
                'mobile',
                'email',
                'is_default',
                'postal_code',
                'national_code',
                'address',
                'created_at_text',
                'updated_at_text',
            ],
        ];
        return $this;
    }

    public function destroy(): self
    {
        $this->data = [
            'attributes' => [
                'id',
            ],
        ];
        return $this;
    }

}
