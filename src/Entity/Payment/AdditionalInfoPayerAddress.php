<?php

namespace MercadoPago\PP\Sdk\Entity\Payment;

use MercadoPago\PP\Sdk\Common\AbstractEntity;

/**
 * Class AdditionalInfoPayerAddress
 *
 * @property string $street_name
 * @property string $zip_code
 * @property string $street_number
 *
 * @package MercadoPago\PP\Sdk\Entity\Payment
 */
class AdditionalInfoPayerAddress extends AbstractEntity
{
    /**
     * @var string
     */
    protected $zip_code;

    /**
     * @var string
     */
    protected $street_name;

    /**
     * @var string
     */
    protected $street_number;
}
