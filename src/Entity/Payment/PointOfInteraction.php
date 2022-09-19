<?php

namespace MercadoPago\PP\Sdk\Entity\Payment;

use MercadoPago\PP\Sdk\Common\AbstractEntity;

/**
 * Class PointOfInteraction
 *
 * @package MercadoPago\PP\Sdk\Entity\Payment
 */
class PointOfInteraction extends AbstractEntity
{
    /**
     * @var string
     */
    public $type;

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
