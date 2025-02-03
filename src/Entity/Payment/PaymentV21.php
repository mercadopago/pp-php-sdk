<?php

namespace MercadoPago\PP\Sdk\Entity\Payment;

class PaymentV21 extends Payment
{
    /**
     * Get uris.
     *
     * @return array
     */
    public function getUris(string $uris_scope = null): array
    {
        $scope_ppcore = $uris_scope === 'beta' ? 'beta' : 'prod';

        return array(
            'post' => '/ppcore/' . $scope_ppcore . '/transaction/v21/payments',
            'get' => '/v1/payments/:id'
        );
    }
}
