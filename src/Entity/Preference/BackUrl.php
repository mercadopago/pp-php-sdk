<?php

namespace MercadoPago\PP\Sdk\Entity\Preference;

use MercadoPago\PP\Sdk\Common\AbstractEntity;

/**
 * Class BackUrl
 *
 * @package MercadoPago\PP\Sdk\Entity\Preference
 */
class BackUrl extends AbstractEntity
{
    /**
     * @var string
     */
    public $failure;

    /**
     * @var string
     */
    public $pending;

    /**
     * @var string
     */
    public $success;

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
