<?php

namespace MercadoPago\PP\Sdk\Entity\Payment;

use MercadoPago\PP\Sdk\Common\AbstractEntity;

/**
 * Class Barcode
 *
 * @property string $type
 * @property string $content
 * @property double $width
 * @property double $height
 *
 * @package MercadoPago\PP\Sdk\Entity\Payment
 */
class Barcode extends AbstractEntity
{
    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $content;

    /**
     * @var double
     */
    protected $width;

    /**
     * @var double
     */
    protected $height;
}
