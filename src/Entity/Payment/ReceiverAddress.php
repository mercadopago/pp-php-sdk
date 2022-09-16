<?php

namespace MercadoPago\PP\Sdk\Entity\Payment;

use MercadoPago\PP\Sdk\Common\AbstractEntity;

/**
 * Class ReceiverAddress
 *
 * @package MercadoPago\PP\Sdk\Entity\Payment
 */
class ReceiverAddress extends AbstractEntity
{
    /**
     * @var string
     */
    public $zip_code;

    /**
     * @var string
     */
    public $state_name;

    /**
     * @var string
     */
    public $city_name;

    /**
     * @var string
     */
    public $street_name;

    /**
     * @var string
     */
    public $apartment;

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
