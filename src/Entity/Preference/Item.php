<?php

namespace MercadoPago\PP\Sdk\Entity\Preference;

use MercadoPago\PP\Sdk\Common\AbstractEntity;

/**
 * Class Item
 *
 * @package MercadoPago\PP\Sdk\Entity\Preference
 */
class Item extends AbstractEntity
{
    /**
     * @var string
     */
    public $category_id;

    /**
     * @var string
     */
    public $currency_id;

    /**
     * @var string
     */
    public $description;

    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $picture_url;

    /**
     * @var int
     */
    public $quantity;

    /**
     * @var string
     */
    public $title;

    /**
     * @var float
     */
    public $unit_price;
}
