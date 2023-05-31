<?php

use Saloon\Contracts\Response;

it('can get single customer details', function () {
    paystackInit()->withMockClient(mockClient());

    $response = paystackInit()->customer()->get('hhjhhhh');

    expect($response)->toBeInstanceOf(Response::class);
});
