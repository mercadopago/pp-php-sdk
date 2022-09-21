<?php

namespace MercadoPago\PP\Sdk\Entity\Preference;

use MercadoPago\PP\Sdk\Common\AbstractEntity;

/**
 * Class Track
 *
 * @package MercadoPago\PP\Sdk\Entity\Preference
 */
class Track extends AbstractEntity
{
    /**
     * @var string
     */
    public $type;

    /**
     * @var string
     */
    public $values;

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
