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
     * @var int
     */
    public $default_shipping_method;

    /**
     * @var string
     */
    public $dimensions;

    /**
     * @var FreeMethodList
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
     * @var ReceiverAddress
     */
    public $receiver_address;

    public function __construct()
    {
        $this->free_methods = new FreeMethodList();
        $this->receiver_address = new ReceiverAddress();
    }

    /**
     * @codeCoverageIgnore
     */
    public function getProperties()
    {
        return get_object_vars($this);
    }
}
