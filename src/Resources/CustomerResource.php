<?php

declare(strict_types=1);

namespace Paystack\Resources;

use Paystack\Requests\Customer\CreateRequest;
use Paystack\Requests\Customer\DeactivateAuthorizationRequest;
use Paystack\Requests\Customer\GetAllRequest;
use Paystack\Requests\Customer\GetSingleRequest;
use Paystack\Requests\Customer\RiskActionRequest;
use Paystack\Requests\Customer\UpdateRequest;
use Paystack\Requests\Customer\ValidateRequest;
use Paystack\Resource;
use Saloon\Contracts\Response;

class CustomerResource extends Resource
{
    public function all(mixed $queryParams = null): Response
    {
        return $this->connector->send(new GetAllRequest($queryParams));
    }

    public function get(string $codeOrEmailOrID): Response
    {
        return $this->connector->send(new GetSingleRequest($codeOrEmailOrID));
    }

    public function create(mixed $attributes): Response
    {
        return $this->connector->send(new CreateRequest($attributes));
    }

    public function update(string $codeOrEmailOrID, mixed $attributes): Response
    {
        return $this->connector->send(new UpdateRequest($codeOrEmailOrID, $attributes));
    }

    public function validate(string $codeOrEmailOrID, mixed $attributes): Response
    {
        return $this->connector->send(new ValidateRequest($codeOrEmailOrID, $attributes));
    }

    public function riskAction(mixed $attributes): Response
    {
        return $this->connector->send(new RiskActionRequest($attributes));
    }

    public function deactivateAuthorization(string $authorizationCode): Response
    {
        return $this->connector->send(new DeactivateAuthorizationRequest($authorizationCode));
    }
}
