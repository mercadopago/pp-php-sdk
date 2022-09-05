<?php

namespace MercadoPago\PP\Sdk\Entity\Shared;

use MercadoPago\PP\Sdk\Common\AbstractEntity;

/**
 * Class Item
 *
 * @package MercadoPago\PP\Sdk\Entity\Shared
 */
class Item extends AbstractEntity
{
    /**
     * @var string
     */
    protected $category_id;

    /**
     * @var string
     */
    protected $currency_id;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $picture_id;

    /**
     * @var string
     */
    protected $picture_url;

    /**
     * @var int
     */
    protected $quantity;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var float
     */
    protected $unit_price;
}
