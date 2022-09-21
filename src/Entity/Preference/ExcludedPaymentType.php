<?php

namespace MercadoPago\PP\Sdk\Entity\Preference;

use MercadoPago\PP\Sdk\Common\AbstractEntity;

/**
 * Class ExcludedPaymentType
 *
 * @package MercadoPago\PP\Sdk\Entity\Preference
 */
class ExcludedPaymentType extends AbstractEntity
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
