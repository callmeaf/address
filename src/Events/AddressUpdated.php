<?php

namespace Callmeaf\Address\Events;

use Callmeaf\Address\Models\Address;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AddressUpdated
{
    use Dispatchable, SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct(public Address $address)
    {

    }
}
