<?php

namespace MercadoPago\PP\Sdk\Entity\Payment;

use MercadoPago\PP\Sdk\Common\AbstractEntity;

/**
 * Class Address
 *
 * @package MercadoPago\PP\Sdk\Entity\Payment
 */
class Address extends AbstractEntity
{
    /**
     * @var string
     */
    public $street_name;

    /**
     * @var string
     */
    public $street_number;
    
    /**
     * @var string
     */
    public $neighborhood;
    
    /**
     * @var string
     */
    public $city;
    
    /**
     * @var string
     */
    public $federal_unit;
    
    /**
     * @var string
     */
    public $zip_code;
}
