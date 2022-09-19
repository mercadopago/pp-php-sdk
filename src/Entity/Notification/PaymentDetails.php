<?php

namespace MercadoPago\PP\Sdk\Entity\Notification;

use MercadoPago\PP\Sdk\Common\AbstractEntity;

/**
 * Class PaymentDetails
 *
 * @package MercadoPago\PP\Sdk\Entity
 */
class PaymentDetails extends AbstractEntity
{
    /**
     * @var float
     */
    public $id;

    /**
     * @var string
     */
    public $status;

    /**
     * @var string
     */
    public $status_detail;

    /**
     * @var string
     */
    public $payment_type_id;

    /**
     * @var string
     */
    public $payment_method_id;

    /**
     * @var float
     */
    public $total_amount;

    /**
     * @var float
     */
    public $paid_amount;

    /**
     * @var float
     */
    public $coupon_amount;

    /**
     * @var float
     */
    public $shipping_cost;

    /**
     * @var PaymentDetailsRefund
     */
    public $refunds;

    public function __construct()
    {
        $this->refunds = new RefundList();
    }

    /**
     * @codeCoverageIgnore
     */
    public function getProperties()
    {
        return get_object_vars($this);
    }
}
