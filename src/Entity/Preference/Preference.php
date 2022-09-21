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
     * @var string
     */
    public $additional_info;

    /**
     * @var string
     */
    public $auto_return;

    /**
     * @var BackUrl
     */
    public $back_urls;

    /**
     * @var boolean
     */
    public $binary_mode;

    /**
     * @var \DateTime
     */
    public $date_of_expiration;

    /**
     * @var DifferentialPricing
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
     * @var ItemList
     */
    public $items;

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
     * @var Payer
     */
    public $payer;

    /**
     * @var PaymentMethod
     */
    public $payment_methods;

    /**
     * @var string
     */
    public $purpose;

    /**
     * @var Shipment
     */
    public $shipments;

    /**
     * @var string
     */
    public $sponsor_id;

    /**
     * @var string
     */
    public $statement_descriptor;

    /**
     * @var TrackList
     */
    public $tracks;

    public function __construct($manager)
    {
        parent::__construct($manager);
        $this->back_urls            = new BackUrl();
        $this->differential_pricing = new DifferentialPricing();
        $this->items                = new ItemList();
        $this->payer                = new Payer();
        $this->payment_methods      = new PaymentMethod();
        $this->shipments            = new Shipment();
        $this->tracks               = new TrackList();
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
            'post' => '/v1/asgard/preferences',
        );

        return $uris;
    }
}
