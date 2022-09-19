<?php

namespace MercadoPago\PP\Sdk\Entity\Preference;

use MercadoPago\PP\Sdk\Common\AbstractEntity;

/**
 * Class Preference
 *
 * @package MercadoPago\PP\Sdk\Entity\Preference
 */
class Preference extends AbstractEntity
{
    /**
     * @var object
     */
    public $additional_info;

    /**
     * @var string
     */
    public $auto_return;

    /**
     * @var object
     */
    public $back_urls;

    /**
     * @var boolean
     */
    public $binary_mode;

    /**
     * @var int
     */
    public $client_id;

    /**
     * @var object
     */
    public $collector;

    /**
     * @var int
     */
    public $collector_id;

    /**
     * @var string
     */
    public $coupon_code;

    /**
     * @var array
     */
    public $coupon_labels;

    /**
     * @var \DateTime
     */
    public $date_created;

    /**
     * @var \DateTime
     */
    public $date_of_expiration;

    /**
     * @var object
     */
    public $differential_pricing;

    /**
     * @var \DateTime
     */
    public $expiration_date_from;

    /**
     * @var \DateTime
     */
    public $expiration_date_to;

    /**
     * @var boolean
     */
    public $expires;

    /**
     * @var string
     */
    public $external_reference;

    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $init_point;

    /**
     * @var object
     */
    public $internal_metadata;

    /**
     * @var array
     */
    public $items;

    /**
     * @var \DateTime
     */
    public $last_updated;

    /**
     * @var boolean
     */
    public $live_mode;

    /**
     * @var string
     */
    public $marketplace;

    /**
     * @var float
     */
    public $marketplace_fee;

    /**
     * @var object
     */
    public $metadata;

    /**
     * @var string
     */
    public $notification_url;

    /**
     * @var string
     */
    public $operation_type;

    /**
     * @var object
     */
    public $payer;

    /**
     * @var object
     */
    public $payment_methods;

    /**
     * @var array
     */
    public $processing_modes;

    /**
     * @var string
     */
    public $product_id;

    /**
     * @var string
     */
    public $purpose;

    /**
     * @var object
     */
    public $redirect_urls;

    /**
     * @var string
     */
    public $sandbox_init_point;

    /**
     * @var object
     */
    public $shipments;

    /**
     * @var string
     */
    public $site_id;

    /**
     * @var int
     */
    public $sponsor_id;

    /**
     * @var string
     */
    public $statement_descriptor;

    /**
     * @var array
     */
    public $taxes;

    /**
     * @var array
     */
    public $total_amount;

    /**
     * @var array
     */
    public $tracks;

    /**
     * @return array
     */
    public function getUris()
    {
        $uris = array(
            'post' => '/v1/asgard/preferences',
        );

        return $uris;
    }

    /**
     * @codeCoverageIgnore
     * Get the properties of the given object.
     *
     * @return mixed
     */
    public function getProperties()
    {
        return get_object_vars($this);
    }
}
