<?php

use Paystack\Paystack;
use Saloon\Contracts\PendingRequest;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

function mockClient(): MockClient
{
    return new MockClient([
        '*' => function (PendingRequest $pendingRequest) {
            $endpoint = $pendingRequest->getRequest()->resolveEndpoint();
            $method = $pendingRequest->getMethod()->value;

            return MockResponse::fixture(implode('/', [$endpoint, $method]));
        },
    ]);
}
