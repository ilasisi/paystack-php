<?php

declare(strict_types=1);

namespace Paystack\Requests\Customer;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class ValidateRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected int|string $codeOrEmailOrID,
        protected mixed $attributes,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return "/customer/$this->codeOrEmailOrID/identification";
    }

    /** @return array<mixed> */
    protected function defaultBody(): array
    {
        return [
            'first_name' => $this->attributes['first_name'] ?? null,
            'last_name' => $this->attributes['last_name'] ?? null,
            'middle_name' => $this->attributes['middle_name'] ?? null,
            'type' => 'bank_account',
            'value' => $this->attributes['value'] ?? null,
            'country' => $this->attributes['country'] ?? null,
            'bvn' => $this->attributes['bvn'] ?? null,
            'bank_code' => $this->attributes['bank_code'] ?? null,
            'account_number' => $this->attributes['account_number'] ?? null,
        ];
    }
}
