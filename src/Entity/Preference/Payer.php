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
     * @var object
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
     * @var object
     */
    public $identification;

    /**
     * @var \DateTime
     */
    public $last_purchase;

    /**
     * @var string
     */
    public $name;

    /**
     * @var object
     */
    public $phone;

    /**
     * @var string
     */
    public $surname;
}
