<?php

use Saloon\Contracts\Response;

it('can whitelist customer', function () {
    paystackInit()->withMockClient(mockClient());

    $response = paystackInit()->customer()->riskAction(
        attributes: [
            'customer' => 'email@email.com',
            'risk_action' => 'allow',
        ]
    );

    expect($response)->toBeInstanceOf(Response::class);
});

it('can blacklist customer', function () {
    paystackInit()->withMockClient(mockClient());

    $response = paystackInit()->customer()->riskAction(
        attributes: [
            'customer' => 'email@email.com',
            'risk_action' => 'deny',
        ]
    );

    expect($response)->toBeInstanceOf(Response::class);
});
