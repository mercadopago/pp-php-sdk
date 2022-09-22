<?php

namespace MercadoPago\PP\Sdk\Entity\Payment;

use MercadoPago\PP\Sdk\Common\AbstractEntity;

/**
 * Class PayerIdentification
 *
 * @package MercadoPago\PP\Sdk\Entity\Payment
 */
class PayerIdentification extends AbstractEntity
{
    /**
     * @var string
     */
    public $type;

    /**
     * @var string
     */
    public $number;
}
