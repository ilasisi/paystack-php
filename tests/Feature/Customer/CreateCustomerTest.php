<?php

use Paystack\Paystack;
use Saloon\Contracts\Response;

it('can create customer', function () {
    $paystack = new Paystack('sk_test_16f20d');

    $paystack->withMockClient(mockClient());

    $response = $paystack->customer()->create(
        attributes: []
    );

    expect($response)->toBeInstanceOf(Response::class);
    expect($response->json()['status'])->toBe(true);
});
