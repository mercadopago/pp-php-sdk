<?php

namespace MercadoPago\PP\Sdk\Entity\Preference;

use MercadoPago\PP\Sdk\Common\AbstractEntity;

/**
 * Class Shipment
 *
 * @package MercadoPago\PP\Sdk\Entity\Preference
 */
class Shipment extends AbstractEntity
{
    /**
     * @var float
     */
    public $cost;

    /**
     * @var string
     */
    public $default_shipping_method;

    /**
     * @var object
     */
    public $dimensions;

    /**
     * @var array
     */
    public $free_methods;

    /**
     * @var boolean
     */
    public $free_shipping;

    /**
     * @var boolean
     */
    public $local_pickup;

    /**
     * @var string
     */
    public $mode;

    /**
     * @var object
     */
    public $receiver_address;
}
