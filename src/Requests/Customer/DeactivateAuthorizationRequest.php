<?php

declare(strict_types=1);

namespace Paystack\Requests\Customer;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class DeactivateAuthorizationRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected string $authorizationCode,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return '/customer/deactivate_authorization';
    }

    /** @return array<mixed> */
    protected function defaultBody(): array
    {
        return [
            'authorization_code' => $this->authorizationCode,
        ];
    }
}