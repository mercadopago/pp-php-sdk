<?php

namespace MercadoPago\PP\Sdk\Entity\Shared;

use MercadoPago\PP\Sdk\Common\AbstractEntity;

/**
 * Class Payer
 *
 * @package MercadoPago\PP\Sdk\Entity\Shared
 */
class Payer extends AbstractEntity
{
    /**
     * @var object
     */
    protected $address;

    /**
     * @var \DateTime
     */
    protected $date_created;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var object
     */
    protected $identification;

    /**
     * @var \DateTime
     */
    protected $last_purchase;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var object
     */
    protected $phone;

    /**
     * @var string
     */
    protected $surname;
}
