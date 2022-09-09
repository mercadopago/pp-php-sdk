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
    public float $id;

    public string $status;

    public string $status_detail;

    public string $payment_type_id;

    public string $payment_method_id;

    public float $total_amount;

    public float $paid_amount;

    public float $coupon_amount;

    public float $shipping_cost;

    public object $refunds;
}
