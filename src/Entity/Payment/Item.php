<?php

namespace MercadoPago\PP\Sdk\Entity\Payment;

use MercadoPago\PP\Sdk\Common\AbstractEntity;

/**
 * Class Item
 *
 * @package MercadoPago\PP\Sdk\Entity\Payment
 */
class Item extends AbstractEntity
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $description;

    /**
     * @var string
     */
    public $picture_url;

    /**
     * @var string
     */
    public $category_id;

    /**
     * @var int
     */
    public $quantity;

    /**
     * @var float
     */
    public $unit_price;

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
