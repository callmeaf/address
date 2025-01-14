<?php

namespace Callmeaf\Address\Http\Resources\V1\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class AddressCollection extends ResourceCollection
{
    public function __construct($resource,protected array|int $only = [])
    {
        parent::__construct($resource);
    }

    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection->map(function($address) {
                [
                    $addressable,
                    $addressableClass,
                    $addressableConfigName,
                ] = addressableResourceData(address: $address);

                return toArrayResource(data: [
                    'id' => fn() => $address->id,
                    'status' => fn() => $address->status,
                    'status_text' => fn() => $address->statusText,
                    'type' => fn() => $address->type,
                    'type_text' => fn() => $address->typeText,
                    'user_id' => fn() => $address->user_id,
                    'province_id' => fn() => $address->province_id,
                    'full_name' => fn() => $address->full_name,
                    'mobile' => fn() => $address->mobile,
                    'email' => fn() => $address->email,
                    'is_default' => fn() => $address->is_default,
                    'national_code' => fn() => $address->national_code,
                    'postal_code' => fn() => $address->postal_code,
                    'address' => fn() => $address->address,
                    'created_at' => fn() => $address->created_at,
                    'created_at_text' => fn() => $address->createdAtText,
                    'updated_at' => fn() => $address->updated_at,
                    'updated_at_text' => fn() => $address->updatedAtText,
                    'deleted_at' => fn() => $address->deleted_at,
                    'deleted_at_text' => fn() => $address->deletedAtText,
                    'addressable' => fn() => $addressable ? new (config('callmeaf-'. $addressableConfigName . '.model_resource'))($addressable,only: $this->only['!addressable'][$addressableClass] ?? []) : null,
                    'province' => fn() => $address->province ? new (config('callmeaf-province.model_resource'))($address->province,only: $this->only['!province'] ?? []) : null,
                ],only: $this->only);
            }),
        ];
    }
}
