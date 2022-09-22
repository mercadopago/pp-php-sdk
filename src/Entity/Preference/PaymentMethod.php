<?php

namespace MercadoPago\PP\Sdk\Entity\Preference;

use MercadoPago\PP\Sdk\Common\AbstractEntity;

/**
 * Class PaymentMethod
 *
 * @package MercadoPago\PP\Sdk\Entity\Preference
 */
class PaymentMethod extends AbstractEntity
{
    /**
     * @var int
     */
    public $default_installments;

    /**
     * @var string
     */
    public $default_payment_method_id;

    /**
     * @var ExcludedPaymentMethodList
     */
    public $excluded_payment_methods;

    /**
     * @var ExcludedPaymentTypeList
     */
    public $excluded_payment_types;

    /**
     * @var int
     */
    public $installments;

    public function __construct()
    {
        $this->excluded_payment_methods = new ExcludedPaymentMethodList();
        $this->excluded_payment_types = new ExcludedPaymentTypeList();
    }
}
