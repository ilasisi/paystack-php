<?php

use Saloon\Contracts\Response;

it('can update customer', function () {
    paystackInit()->withMockClient(mockClient());

    $response = paystackInit()->customer()->update(
        codeOrEmailOrID: 'email@email.com',
        attributes: []
    );

    expect($response)->toBeInstanceOf(Response::class);
});
