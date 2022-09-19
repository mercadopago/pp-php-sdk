<?php

namespace MercadoPago\PP\Sdk\Entity\Payment;

use MercadoPago\PP\Sdk\Common\AbstractEntity;

/**
 * Class Payer
 *
 * @package MercadoPago\PP\Sdk\Entity\Payment
 */
class Payer extends AbstractEntity
{
    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $entity_type;

    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $first_name;

    /**
     * @var string
     */
    public $last_name;

    /**
     * @var PayerIdentification
     */
    public $identification;

    /**
     * @var Address
     */
    public $address;

    public function __construct()
    {
        $this->identification = new PayerIdentification();
        $this->address        = new Address();
    }

    /**
     * @codeCoverageIgnore
     */
    public function getProperties()
    {
        return get_object_vars($this);
    }
}
