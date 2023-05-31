<?php

use Saloon\Contracts\Response;

it('can list all customers', function () {
    paystackInit()->withMockClient(mockClient());

    $response = paystackInit()->customer()->all();

    expect($response)->toBeInstanceOf(Response::class);
});
