<?php

use Paystack\Paystack;
use Saloon\Contracts\Response;

it('can whitelist customer', function () {
    $paystack = new Paystack('sk_test_16f20d');

    $paystack->withMockClient(mockClient());

    $response = $paystack->customer()->riskAction(
        attributes: [
            'customer' => 'email@email.com',
            'risk_action' => 'allow',
        ]
    );

    expect($response)->toBeInstanceOf(Response::class);
    expect($response->json()['status'])->toBe(true);
});

it('can blacklist customer', function () {
    $paystack = new Paystack('sk_test_16f20d_key');

    $paystack->withMockClient(mockClient());

    $response = $paystack->customer()->riskAction(
        attributes: [
            'customer' => 'email@email.com',
            'risk_action' => 'deny',
        ]
    );

    expect($response)->toBeInstanceOf(Response::class);
});
