<?php

use Saloon\Contracts\Response;

it('can create customer', function () {
    paystackInit()->withMockClient(mockClient());

    $response = paystackInit()->customer()->create(
        attributes: []
    );

    expect($response)->toBeInstanceOf(Response::class);
});
