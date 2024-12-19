<?php

namespace Callmeaf\Address\Utilities\V1\Api\Address;

use Callmeaf\Base\Utilities\V1\Resources;

class AddressResources extends Resources
{
    public function index(): self
    {
        $this->data = [
            'relations' => [
                'user',
                'province',
            ],
            'columns' => [
                'id',
                'status',
                'type',
                'user_id',
                'province_id',
                'full_name',
                'mobile',
                'delivery_code',
                'created_at',
                'updated_at',
            ],
            'attributes' => [
                'id',
                'status',
                'status_text',
                'type',
                'type_text',
                'user_id',
                'province_id',
                'full_name',
                'mobile',
                'delivery_code',
                'created_at_text',
                'updated_at_text',
                'user',
                '!user' => [
                    'id',
                    'type',
                    'first_name',
                    'last_name',
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
                'user_id',
                'province_id',
                'full_name',
                'mobile',
                'email',
                'delivery_code',
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
                'user_id',
                'province_id',
                'full_name',
                'mobile',
                'email',
                'delivery_code',
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
                'user_id',
                'province_id',
                'full_name',
                'mobile',
                'email',
                'delivery_code',
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
                'user_id',
                'province_id',
                'full_name',
                'mobile',
                'email',
                'delivery_code',
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
