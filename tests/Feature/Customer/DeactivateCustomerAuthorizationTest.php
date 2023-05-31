<?php

use Saloon\Contracts\Response;

it('can deactivate customer authorization', function () {
    paystackInit()->withMockClient(mockClient());

    $response = paystackInit()->customer()->deactivateAuthorization(
        authorizationCode: 'AUTH_gghggg'
    );

    expect($response)->toBeInstanceOf(Response::class);
});
