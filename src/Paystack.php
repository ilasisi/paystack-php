<?php

declare(strict_types=1);

namespace Paystack;

use Paystack\Resources\CustomerResource;
use Saloon\Contracts\Authenticator;
use Saloon\Http\Auth\TokenAuthenticator;
use Saloon\Http\Connector;

class Paystack extends Connector
{
    public function __construct(
        protected string $paystackSecretKey,
    ) {
        //
    }

    public function resolveBaseUrl(): string
    {
        return 'https://api.paystack.co';
    }

    protected function defaultHeaders(): array
    {
        return [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];
    }

    protected function defaultAuth(): ?Authenticator
    {
        return new TokenAuthenticator($this->paystackSecretKey);
    }

    public function defaultConfig(): array
    {
        return [
            'timeout' => 30,
        ];
    }

    public function customer(): CustomerResource
    {
        return new CustomerResource($this);
    }
}