<?php

use Callmeaf\Address\Enums\AddressStatus;
use Callmeaf\Address\Enums\AddressType;

return [
    AddressStatus::class => [
        AddressStatus::ACTIVE->name => 'Active',
        AddressStatus::INACTIVE->name => 'InActive',
    ],
    AddressType::class => [
        AddressType::HOME->name => 'Home',
        AddressType::WORKPLACE->name => 'Workplace',
        AddressType::OTHER->name => 'Other',
    ],
];
