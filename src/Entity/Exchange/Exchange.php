<?php

namespace MercadoPago\PP\Sdk\Entity\Exchange;

use MercadoPago\PP\Sdk\Common\AbstractEntity;
use MercadoPago\PP\Sdk\Common\Manager;
use MercadoPago\PP\Sdk\Interfaces\RequesterEntityInterface;

/**
 * Handles the integration with the Payment Methods service.
 *
 * The currency exchange rate is defined using the currency configured in the seller's store and the
 * currency based on the platform and its country of origin.
 *
 * @property string $creation_date
 * @property string $currency_base
 * @property string $currency_quote
 * @property float $rate
 *
 * @package MercadoPago\PP\Sdk\Entity\Exchange
 */
class Exchange extends AbstractEntity implements RequesterEntityInterface
{
    /**
     * @var string
     */
    protected $creation_date;

    /**
     * @var string
     */
    protected $currency_base;

    /**
     * @var string
     */
    protected $currency_quote;

    /**
     * @var float
     */
    protected $rate;

    /**
     * Exchange constructor.
     *
     * @param Manager|null $manager
     */
    public function __construct($manager)
    {
        parent::__construct($manager);
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
            'read' => []
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
            'get' => '/ppcore/prod/payment-methods/v1/exchange',
        );
    }

    /**
     * Returns the quote value for a given currency.
     *
     * It is necessary to add the access_token when instantiating the SDK
     *
     * @return Exchange the list with the payment methods
     */
    public function getExchangeRate(string $currencyId = null) : Exchange
    {
        $queryStrings = array('currency.id' => $currencyId);
        $response = parent::read([], $queryStrings, true);
        $this->setEntity($response);
        return $this;
    }
}
