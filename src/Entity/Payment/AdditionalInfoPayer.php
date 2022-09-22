<?php

namespace MercadoPago\PP\Sdk\Entity\Payment;

use MercadoPago\PP\Sdk\Common\AbstractEntity;

/**
 * Class AdditionalInfoPayer
 *
 * @package MercadoPago\PP\Sdk\Entity\Payment
 */
class AdditionalInfoPayer extends AbstractEntity
{
    /**
     * @var string
     */
    public $first_name;
    
    /**
     * @var string
     */
    public $last_name;

    /**
     * @var Phone
     */
    public $phone;

    /**
     * @var AdditionalInfoPayerAddress
     */
    public $address;

    public function __construct()
    {
        $this->phone   = new Phone();
        $this->address = new AdditionalInfoPayerAddress();
    }
}
