<?php

if(!function_exists('addressableResourceData')) {
    function addressableResourceData(\Callmeaf\Address\Models\Address|\Callmeaf\Address\Http\Resources\V1\Api\AddressResource $address): array
    {
        $addressable = $address->addressable;
        $addressableClass = $addressable::class;
        $addressableConfigName = str(
            string: getShortNameClass(objectOrClass: $addressable)
        )->snake(delimiter: '-')->toString();

        return [
            $addressable,
            $addressableClass,
            $addressableConfigName
        ];
    }
}
