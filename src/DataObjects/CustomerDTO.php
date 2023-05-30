<?php

namespace Paystack\DataObjects;

class CustomerDTO
{
    public function __construct(
        public int $id,
        public string $customer_code,
        public string $first_name,
        public string $last_name,
        public string $email,
        public string $phone,
        public string $integration,
        public string $domain,
        public string $risk_action,
        public array $metadata,
        public string $createdAt,
        public string $updatedAt,
    ) {
    }

    public static function fromSaloon(mixed $customer): static
    {
        return new static(
            id: intval(data_get($customer, 'id')),
            customer_code: strval(data_get($customer, 'customer_code')),
            first_name: strval(data_get($customer, 'first_name')),
            last_name: strval(data_get($customer, 'last_name')),
            email: strval(data_get($customer, 'email')),
            phone: strval(data_get($customer, 'phone')),
            integration: strval(data_get($customer, 'integration')),
            domain: strval(data_get($customer, 'domain')),
            risk_action: strval(data_get($customer, 'risk_action')),
            metadata: data_get($customer, 'metadata'),
            createdAt: strval(data_get($customer, 'createdAt')),
            updatedAt: strval(data_get($customer, 'updatedAt')),
        );
    }
}
