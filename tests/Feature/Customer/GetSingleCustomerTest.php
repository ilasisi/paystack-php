<?php

use Paystack\Paystack;
use Saloon\Contracts\Response;

it('can get single customer details', function () {
    $paystack = new Paystack('sk_test_16f20d');

    $paystack->withMockClient(mockClient());

    $response = $paystack->customer()->get('CUS_m9');

    expect($response)->toBeInstanceOf(Response::class);
    expect($response->json()['status'])->toBe(true);
});