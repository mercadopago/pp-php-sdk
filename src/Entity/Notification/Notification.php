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
    /**
     * @var string
     */
    public $notification_id;

    /**
     * @var string
     */
    public $notification_url;

    /**
     * @var string
     */
    public $status;

    /**
     * @var float
     */
    public $transaction_id;

    /**
     * @var string
     */
    public $transaction_type;

    /**
     * @var float
     */
    public $transaction_amount;

    /**
     * @var float
     */
    public $total_pending;

    /**
     * @var float
     */
    public $total_approved;

    /**
     * @var float
     */
    public $total_paid;

    /**
     * @var float
     */
    public $total_rejected;

    /**
     * @var float
     */
    public $total_refunded;

    /**
     * @var float
     */
    public $total_cancelled;

    /**
     * @var float
     */
    public $total_charged_back;

    /**
     * @var array
     */
    public $payments_metadata;

    /**
     * @var PaymentDetails
     */
    public $payments_details;

    public function __construct($manager)
    {
        parent::__construct($manager);
        $this->payments_details = new PaymentDetailsList();
    }

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
