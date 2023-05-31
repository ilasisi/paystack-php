<?php

use Saloon\Contracts\Response;

it('can validate', function () {
    paystackInit()->withMockClient(mockClient());

    $response = paystackInit()->customer()->validate(
        codeOrEmailOrID: 'email@email.com',
        attributes: [],
    );

    expect($response)->toBeInstanceOf(Response::class);
});
