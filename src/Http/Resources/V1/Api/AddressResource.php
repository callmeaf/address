<?php

namespace Callmeaf\Address\Http\Resources\V1\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
{
    public function __construct($resource,protected array|int $only = [])
    {
        parent::__construct($resource);
    }

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return toArrayResource(data: [
            'id' => fn() => $this->id,
            'status' => fn() => $this->status,
            'status_text' => fn() => $this->statusText,
            'type' => fn() => $this->type,
            'type_text' => fn() => $this->typeText,
            'user_id' => fn() => $this->user_id,
            'province_id' => fn() => $this->province_id,
            'full_name' => fn() => $this->full_name,
            'mobile' => fn() => $this->mobile,
            'email' => fn() => $this->email,
            'delivery_code' => fn() => $this->delivery_code,
            'national_code' => fn() => $this->national_code,
            'postal_code' => fn() => $this->postal_code,
            'address' => fn() => $this->address,
            'created_at' => fn() => $this->created_at,
            'created_at_text' => fn() => $this->createdAtText,
            'updated_at' => fn() => $this->updated_at,
            'updated_at_text' => fn() => $this->updatedAtText,
            'deleted_at' => fn() => $this->deleted_at,
            'deleted_at_text' => fn() => $this->deletedAtText,
            'user' => fn() => $this->user ? new (config('callmeaf-user.model_resource'))($this->user,only: $this->only['!user'] ?? []) : null,
            'province' => fn() => $this->province ? new (config('callmeaf-province.model_resource'))($this->province,only: $this->only['!province'] ?? []) : null,
        ],only: $this->only);
    }
}
