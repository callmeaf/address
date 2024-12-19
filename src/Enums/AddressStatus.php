<?php

namespace Callmeaf\Address\Enums;

enum AddressStatus: int
{
    case ACTIVE = 1;
    case INACTIVE = 2;
    case PENDING = 3;
}
