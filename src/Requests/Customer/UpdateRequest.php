<?php

declare(strict_types=1);

namespace Paystack\Requests\Customer;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;
use stdClass;

class UpdateRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function __construct(
        protected int|string $codeOrEmailOrID,
        protected mixed $attributes,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return "/customer/$this->codeOrEmailOrID";
    }

    /** @return array<mixed> */
    protected function defaultBody(): array
    {
        return [
            'first_name' => $this->attributes['first_name'] ?? null,
            'last_name' => $this->attributes['last_name'] ?? null,
            'phone' => $this->attributes['phone'] ?? null,
            'metadata' => $this->attributes['metadata'] ?? new stdClass,
        ];
    }
}
