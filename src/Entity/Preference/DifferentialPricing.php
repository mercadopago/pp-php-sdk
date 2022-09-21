<?php

namespace MercadoPago\PP\Sdk\Entity\Preference;

use MercadoPago\PP\Sdk\Common\AbstractEntity;

/**
 * Class DifferentialPricing
 *
 * @package MercadoPago\PP\Sdk\Entity\Preference
 */
class DifferentialPricing extends AbstractEntity
{
    /**
     * @var int
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
