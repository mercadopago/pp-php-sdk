<?php

namespace MercadoPago\PP\Sdk\Entity\Preference;

use MercadoPago\PP\Sdk\Common\AbstractEntity;
use MercadoPago\PP\Sdk\Common\Manager;
use MercadoPago\PP\Sdk\Interfaces\RequesterEntityInterface;
use MercadoPago\PP\Sdk\Entity\Payment\AdditionalInfo;

/**
 * Class Preference
 *
 * @property AdditionalInfo $additional_info
 * @property string $auto_return
 * @property bool $binary_mode
 * @property string $expiration_date_from
 * @property string $expiration_date_to
 * @property bool $expires
 * @property string $external_reference
 * @property string $notification_url
 * @property string $purpose
 * @property string $statement_descriptor
 * @property ItemList $items
 * @property PaymentMethod $payment_methods
 * @property BackUrl $back_urls
 * @property Payer $payer
 * @property Shipment $shipments
 * @property array $metadata
 * @property string $date_of_expiration
 * @property array $differential_pricing
 * @property string $marketplace
 * @property float $marketplace_fee
 * @property string $sponsor_id
 * @property TrackList $tracks
 *
 * @package MercadoPago\PP\Sdk\Entity\Preference
 */
class Preference extends AbstractEntity implements RequesterEntityInterface
{
    /**
     * @var AdditionalInfo
     */
    protected $additional_info;

    /**
     * @var string
     */
    protected $auto_return;

    /**
     * @var bool
     */
    protected $binary_mode;

    /**
     * @var string
     */
    protected $expiration_date_from;

    /**
     * @var string
     */
    protected $expiration_date_to;

    /**
     * @var bool
     */
    protected $expires;

    /**
     * @var string
     */
    protected $external_reference;

    /**
     * @var string
     */
    protected $notification_url;

    /**
     * @var string
     */
    protected $purpose;

    /**
     * @var string
     */
    protected $statement_descriptor;

    /**
     * @var ItemList
     */
    protected $items;

    /**
     * @var PaymentMethod
     */
    protected $payment_methods;

    /**
     * @var BackUrl
     */
    protected $back_urls;

    /**
     * @var Payer
     */
    protected $payer;

    /**
     * @var Shipment
     */
    protected $shipments;

    /**
     * @var array
     */
    protected $metadata;

    /**
     * @var string
     */
    protected $date_of_expiration;

    /**
     * @var array
     */
    protected $differential_pricing;

    /**
     * @var string
     */
    protected $marketplace;

    /**
     * @var float
     */
    protected $marketplace_fee;

    /**
     * @var string
     */
    protected $sponsor_id;

    /**
     * @var TrackList
     */
    protected $tracks;

    /**
     * Preference constructor.
     *
     * @param Manager|null $manager
     */
    public function __construct($manager)
    {
        parent::__construct($manager);
        $this->additional_info      = new AdditionalInfo($manager);
        $this->back_urls            = new BackUrl($manager);
        $this->items                = new ItemList($manager);
        $this->payer                = new Payer($manager);
        $this->payment_methods      = new PaymentMethod($manager);
        $this->shipments            = new Shipment($manager);
        $this->tracks               = new TrackList($manager);
    }

    /**
     * Exclude properties from entity building.
     *
     * @return void
     */
    public function setExcludedProperties()
    {
        $this->excluded_properties = [];
    }

    /**
     * Get and set custom headers for entity.
     *
     * @return array
     */
    public function getHeaders(): array
    {
        return [
            'read' => [],
            'save' => [],
        ];
    }

    /**
     * Get uris.
     *
     * @return array
     */
    public function getUris(): array
    {
        return array(
            'post' => '/v1/asgard/preferences',
        );
    }
}
