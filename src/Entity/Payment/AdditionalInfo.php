<?php

namespace MercadoPago\PP\Sdk\Entity\Payment;

use MercadoPago\PP\Sdk\Common\AbstractEntity;

/**
 * Class AdditionalInfo
 *
 * @package MercadoPago\PP\Sdk\Entity\Payment
 */
class AdditionalInfo extends AbstractEntity
{
    /**
     * @var string
     */
    public $ip_address;

    /**
     * @var ItemList
     */
    public $items;

    /**
     * @var AdditionalInfoPayer
     */
    public $payer;

    /**
     * @var Shipments
     */
    public $shipments;

    public function __construct()
    {
        $this->items     = new ItemList();
        $this->payer     = new AdditionalInfoPayer();
        $this->shipments = new Shipments();
    }
}
