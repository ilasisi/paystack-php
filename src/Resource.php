<?php

declare(strict_types=1);

namespace Paystack;

use Saloon\Contracts\Connector;

class Resource
{
    public function __construct(protected Connector $connector)
    {
        //
    }
}
