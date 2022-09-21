<?php

namespace MercadoPago\PP\Sdk\Entity\Preference;

use MercadoPago\PP\Sdk\Common\AbstractEntity;

/**
 * Class Payer
 *
 * @package MercadoPago\PP\Sdk\Entity\Preference
 */
class Payer extends AbstractEntity
{
    /**
     * @var Address
     */
    public $address;

    /**
     * @var \DateTime
     */
    public $date_created;

    /**
     * @var string
     */
    public $email;

    /**
     * @var PayerIdentification
     */
    public $identification;

    /**
     * @var string
     */
    public $name;

    /**
     * @var Phone
     */
    public $phone;

    /**
     * @var string
     */
    public $surname;

    public function __construct()
    {
        $this->address        = new Address();
        $this->identification = new PayerIdentification();
        $this->phone          = new Phone();
    }

    /**
     * @codeCoverageIgnore
     */
    public function getProperties()
    {
        return get_object_vars($this);
    }
}
