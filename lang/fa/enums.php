<?php

use Callmeaf\Address\Enums\AddressStatus;
use Callmeaf\Address\Enums\AddressType;

return [
    AddressStatus::class => [
        AddressStatus::ACTIVE->name => 'فعال',
        AddressStatus::INACTIVE->name => 'غیرفعال',
    ],
    AddressType::class => [
        AddressType::HOME->name => 'خانه',
        AddressType::WORKPLACE->name => 'محل کار',
        AddressType::OTHER->name => 'دیگر',
    ],
];
