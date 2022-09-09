<?php

namespace MercadoPago\PP\Sdk\Entity\Notification;

use MercadoPago\PP\Sdk\Common\AbstractEntity;

/**
 * Class Notification
 *
 * @package MercadoPago\PP\Sdk\Entity
 */
class Notification extends AbstractEntity
{
    public string $notification_id;

    public string $notification_url;

    public string $status;

    public float $transaction_id;

    public string $transaction_type;

    public float $transaction_amount;

    public float $total_pending;

    public float $total_approved;

    public float $total_paid;

    public float $total_rejected;

    public float $total_refunded;

    public float $total_cancelled;

    public float $total_charged_back;

    public array $payments_metadata;

    public array $payments_details;

    /**
     * @codeCoverageIgnore
     */
    public function getProperties()
    {
        return get_object_vars($this);
    }

    /**
     * @return array
     */
    public function getUris()
    {
        $uris = array(
            'get' => '/bifrost/notification/status/:id',
        );

        return $uris;
    }
}
