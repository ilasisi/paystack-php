<?php

declare(strict_types=1);

namespace Paystack\Requests\Customer;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetAllRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected ?mixed $queryParams,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return '/customer';
    }

    /** @return array<mixed> */
    protected function defaultQuery(): array
    {
        return [
            'perPage' => $this->queryParams['perPage'] ?? null,
            'page' => $this->queryParams['page'] ?? null,
            'from' => $this->queryParams['from'] ?? null,
            'to' => $this->queryParams['to'] ?? null,
        ];
    }
}