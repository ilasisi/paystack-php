<?php

declare(strict_types=1);

namespace Paystack\Requests\Customer;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;
use stdClass;

class CreateRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected array $attributes,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return '/customer';
    }

    protected function defaultBody(): array
    {
        return [
            'email' => $this->attributes['email'] ?? null,
            'first_name' => $this->attributes['first_name'] ?? null,
            'last_name' => $this->attributes['last_name'] ?? null,
            'phone' => $this->attributes['phone'] ?? null,
            'metadata' => $this->attributes['metadata'] ?? new stdClass,
        ];
    }
}
