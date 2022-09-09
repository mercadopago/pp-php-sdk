<?php

namespace MercadoPago\PP\Sdk\Entity\Notification;

use MercadoPago\PP\Sdk\Common\AbstractCollection;

/**
 * Class PaymentMetadata
 *
 * @package MercadoPago\PP\Sdk\Entity
 */
class PaymentMetadata extends AbstractCollection
{
    public string $account_name;

    public string $callback_url;

    public string $delay_auto_settle;

    public string $merchant_name;

    public string $order_id;

    public string $original_notification_url;

    public string $seller_website;

    public string $uuid;

    public string $vtex_payment_id;

    public string $vtex_transaction_id;
}
