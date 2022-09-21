<?php

namespace MercadoPago\PP\Sdk\Entity\Preference;

use MercadoPago\PP\Sdk\Common\AbstractEntity;

/**
 * Class ReceiverAddress
 *
 * @package MercadoPago\PP\Sdk\Entity\Preference
 */
class ReceiverAddress extends AbstractEntity
{
    /**
     * @var string
     */
    public $apartment;

    /**
     * @var string
     */
    public $city_name;

    /**
     * @var string
     */
    public $floor;

    /**
     * @var string
     */
    public $state_name;

    /**
     * @var string
     */
    public $street_name;

    /**
     * @var int
     */
    public $street_number;

    /**
     * @var string
     */
    public $zip_code;

    public function __construct()
    {
    }

    /**
     * @codeCoverageIgnore
     */
    public function getProperties()
    {
        return get_object_vars($this);
    }
}
