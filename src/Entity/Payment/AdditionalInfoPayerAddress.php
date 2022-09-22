<?php

namespace MercadoPago\PP\Sdk\Entity\Payment;

use MercadoPago\PP\Sdk\Common\AbstractEntity;

/**
 * Class AdditionalInfoPayerAddress
 *
 * @package MercadoPago\PP\Sdk\Entity\Payment
 */
class AdditionalInfoPayerAddress extends AbstractEntity
{
    /**
     * @var string
     */
    public $zip_code;
    
    /**
     * @var string
     */
    public $street_name;
}
