<?php

namespace MercadoPago\PP\Sdk\Entity\Preference;

use MercadoPago\PP\Sdk\Common\AbstractEntity;

/**
 * Class PayerIdentification
 *
 * @package MercadoPago\PP\Sdk\Entity\Preference
 */
class PayerIdentification extends AbstractEntity
{
    /**
     * @var string
     */
    public $number;

    /**
     * @var string
     */
    public $type;
}
