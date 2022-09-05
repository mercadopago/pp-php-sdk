<?php

namespace MercadoPago\PP\Sdk\Entity;

use MercadoPago\PP\Sdk\Common\AbstractEntity;

/**
 * Class Preference
 *
 * @package MercadoPago\PP\Sdk\Entity\Preference
 */
class Preference extends AbstractEntity
{
    /**
     * @var string
     */
    protected $additional_info;

    /**
     * @var string
     */
    protected $auto_return;

    /**
     * @var object
     */
    protected $back_urls;

    /**
     * @var boolean
     */
    protected $binary_mode;

    /**
     * @var int
     */
    protected $client_id;

    /**
     * @var object
     */
    protected $collector;

    /**
     * @var int
     */
    protected $collector_id;

    /**
     * @var string
     */
    protected $coupon_code;

    /**
     * @var array
     */
    protected $coupon_labels;

    /**
     * @var \DateTime
     */
    protected $date_created;

    /**
     * @var \DateTime
     */
    protected $date_of_expiration;

    /**
     * @var object
     */
    protected $differential_pricing;

    /**
     * @var \DateTime
     */
    protected $expiration_date_from;

    /**
     * @var \DateTime
     */
    protected $expiration_date_to;

    /**
     * @var boolean
     */
    protected $expires;

    /**
     * @var string
     */
    protected $external_reference;

    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $init_point;

    /**
     * @var object
     */
    protected $internal_metadata;

    /**
     * @var array
     */
    protected $items;

    /**
     * @var \DateTime
     */
    protected $last_updated;

    /**
     * @var boolean
     */
    protected $live_mode;

    /**
     * @var string
     */
    protected $marketplace;

    /**
     * @var float
     */
    protected $marketplace_fee;

    /**
     * @var object
     */
    protected $metadata;

    /**
     * @var string
     */
    protected $notification_url;

    /**
     * @var string
     */
    protected $operation_type;

    /**
     * @var object
     */
    protected $payer;

    /**
     * @var object
     */
    protected $payment_methods;

    /**
     * @var array
     */
    protected $processing_modes;

    /**
     * @var string
     */
    protected $product_id;

    /**
     * @var string
     */
    protected $purpose;

    /**
     * @var object
     */
    protected $redirect_urls;

    /**
     * @var string
     */
    protected $sandbox_init_point;

    /**
     * @var object
     */
    protected $shipments;

    /**
     * @var string
     */
    protected $site_id;

    /**
     * @var int
     */
    protected $sponsor_id;

    /**
     * @var string
     */
    protected $statement_descriptor;

    /**
     * @var array
     */
    protected $taxes;

    /**
     * @var array
     */
    protected $total_amount;

    /**
     * @var array
     */
    protected $tracks;
}
