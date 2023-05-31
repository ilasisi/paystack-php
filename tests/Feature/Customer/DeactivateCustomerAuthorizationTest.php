<?php

use Paystack\Paystack;
use Saloon\Contracts\Response;

it('can deactivate customer authorization', function () {
    $paystack = new Paystack('sk_test_16f20d');

    $paystack->withMockClient(mockClient());

    $response = $paystack->customer()->deactivateAuthorization(
        authorizationCode: 'AUTH_gghggg'
    );

    expect($response)->toBeInstanceOf(Response::class);
    expect($response->json()['status'])->toBe(true);
});
