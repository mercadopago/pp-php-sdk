<?php

namespace MercadoPago\PP\Sdk\Entity\Payment;

class PaymentV2 extends Payment
{
    /**
     * Get uris.
     *
     * @return array
     */
    public function getUris(string $uris_scope = null): array
    {
        $scope_ppcore = $uris_scope === 'beta' ? '/beta' : '';

        return array(
            'post' => $scope_ppcore . '/v2/asgard/payments',
            'get' => '/v1/payments/:id'
        );
    }
}
