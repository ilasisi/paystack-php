<?php

declare(strict_types=1);

namespace Paystack\Requests\Customer;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetSingleRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(public int|string $codeOrEmailOrID)
    {
        //
    }

    public function resolveEndpoint(): string
    {
        return "/customer/$this->codeOrEmailOrID";
    }
}
