<?php

declare(strict_types=1);

namespace Paystack\Requests\Customer;

use Paystack\DataObjects\CustomerDTO;
use Saloon\Contracts\Response;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Request\CastDtoFromResponse;

class GetSingleRequest extends Request
{
    use CastDtoFromResponse;

    protected Method $method = Method::GET;

    public function __construct(public string $codeOrEmail)
    {
        //
    }

    public function resolveEndpoint(): string
    {
        return "/customer/$this->codeOrEmail";
    }

    public function createDtoFromResponse(Response $response): array
    {
        return [
            'status' => $response->json('status'),
            'message' => $response->json('message'),
            'data' => $response->json('data') ? CustomerDTO::fromSaloon(
                customer: $response->json('data'),
            ) : null,
        ];
    }
}
