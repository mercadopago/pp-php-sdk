<?php

namespace MercadoPago\PP\Sdk\Entity\Payment;

use MercadoPago\PP\Sdk\Common\AbstractEntity;
use MercadoPago\PP\Sdk\Common\Manager;

/**
 * Class Shipments
 *
 * @property string $default_shipping_method
 * @property ReceiverAddress $receiver_address
 *
 * @package MercadoPago\PP\Sdk\Entity\Payment
 */
class Shipments extends AbstractEntity
{
    /**
     * @var string
     */
    protected $default_shipping_method;

    /**
     * @var ReceiverAddress
     */
    protected $receiver_address;

    /**
     * Shipments constructor.
     *
     * @param Manager|null $manager
     */
    public function __construct($manager)
    {
        parent::__construct($manager);
        $this->receiver_address = new ReceiverAddress();
    }
}
