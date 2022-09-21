<?php

namespace MercadoPago\PP\Sdk\Entity\Preference;

use MercadoPago\PP\Sdk\Common\AbstractEntity;

/**
 * Class ExcludedPaymentMethod
 *
 * @package MercadoPago\PP\Sdk\Entity\Preference
 */
class ExcludedPaymentMethod extends AbstractEntity
{
    /**
     * @var string
     */
    public $id;

    public function __construct()
    {
    }

    /**
     * @codeCoverageIgnore
     */
    public function getProperties()
    {
        return get_object_vars($this);
    }
}
