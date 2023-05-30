<?php

declare(strict_types=1);

namespace Paystack\Requests\Customer;

use Illuminate\Support\Collection;
use Paystack\DataObjects\CustomerDTO;
use Saloon\Contracts\Response;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Request\CastDtoFromResponse;

class GetAllRequest extends Request
{
    use CastDtoFromResponse;

    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/customer';
    }

    public function createDtoFromResponse(Response $response): array
    {
        return [
            'status' => $response->json('status'),
            'message' => $response->json('message'),
            'data' => (new Collection(
                items: $response->json('data'),
            ))->map(function ($customer): CustomerDTO {
                return CustomerDTO::fromSaloon(
                    customer: $customer,
                );
            }),
        ];
    }
}
