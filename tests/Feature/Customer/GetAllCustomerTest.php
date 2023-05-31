<?php

use Paystack\Paystack;
use Saloon\Contracts\Response;

it('can list all customers', function () {
    $paystack = new Paystack('sk_test_16f20d');

    $paystack->withMockClient(mockClient());

    $response = $paystack->customer()->all();

    expect($response)->toBeInstanceOf(Response::class);
    expect($response->json()['status'])->toBe(true);
});
