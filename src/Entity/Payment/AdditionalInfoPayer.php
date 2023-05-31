<?php

namespace MercadoPago\PP\Sdk\Entity\Payment;

use MercadoPago\PP\Sdk\Common\AbstractEntity;
use MercadoPago\PP\Sdk\Common\Manager;

/**
 * Class AdditionalInfoPayer
 *
 * @property string $first_name
 * @property string $last_name
 * @property AdditionalInfoPayerAddress $address
 * @property Phone $phone
 * @property string $registration_date
 *
 * @package MercadoPago\PP\Sdk\Entity\Payment
 */
class AdditionalInfoPayer extends AbstractEntity
{
    /**
     * @var string
     */
    protected $first_name;

    /**
     * @var string
     */
    protected $last_name;

    /**
     * @var AdditionalInfoPayerAddress
     */
    protected $address;

    /**
     * @var Phone
     */
    protected $phone;

    /**
     * @var string
     */
    protected $registration_date;

    /**
     * AdditionalInfoPayer constructor.
     *
     * @param Manager|null $manager
     */
    public function __construct($manager)
    {
        parent::__construct($manager);
        $this->phone   = new Phone($manager);
        $this->address = new AdditionalInfoPayerAddress($manager);
    }
}
