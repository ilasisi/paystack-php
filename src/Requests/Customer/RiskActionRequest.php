<?php

declare(strict_types=1);

namespace Paystack\Requests\Customer;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class RiskActionRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected mixed $attributes,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return '/customer/set_risk_action';
    }

    /** @return array<mixed> */
    protected function defaultBody(): array
    {
        return [
            'customer' => $this->attributes['customer'] ?? null,
            'risk_action' => $this->attributes['risk_action'] ?? null,
        ];
    }
}
