<?php

declare(strict_types=1);

namespace Paystack\Resources;

use Paystack\Requests\Customer\GetAllRequest;
use Paystack\Requests\Customer\GetSingleRequest;
use Paystack\Resource;
use Saloon\Contracts\Response;

class CustomerResource extends Resource
{
    public function all(): Response
    {
        return $this->connector->send(new GetAllRequest());
    }

    public function get(string $codeOrEmail): Response
    {
        return $this->connector->send(new GetSingleRequest($codeOrEmail));
    }
}
