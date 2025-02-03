<?php

namespace MercadoPago\PP\Sdk\Entity\Onboarding;

use MercadoPago\PP\Sdk\Common\AbstractEntity;
use MercadoPago\PP\Sdk\Interfaces\RequesterEntityInterface;
use MercadoPago\PP\Sdk\Common\Manager;

/**
 * Class Application
 *
 * @property string $name
 * @property string $description
 * @property string $site_id
 * @property string $access_token
 * @property string $test_access_token
 * @property bool $sandbox_mode
 * @property bool $active
 * @property array $scopes
 * @property string $thumbnail
 *
 * @package MercadoPago\PP\Sdk\Entity\Onboarding
 */
class Application extends AbstractEntity implements RequesterEntityInterface
{
    /**
     * @var string
    */
    protected $name;

    /**
     * @var string
    */
    protected $description;

    /**
     * @var string
    */
    protected $site_id;

    /**
     * @var string
    */
    protected $access_token;

    /**
     * @var string
    */
    protected $test_access_token;

    /**
     * @var bool
    */
    protected $sandbox_mode;

    /**
     * @var bool
    */
    protected $active;

    /**
     * @var array
    */
    protected $scopes;

    /**
     * @var string
    */
    protected $thumbnail;

    /**
     * Application constructor.
     *
     * @param Manager|null $manager
    */
    public function __construct($manager)
    {
        parent::__construct($manager);
    }

    /**
     * Get uris.
     *
     * @return array
    */
    public function getUris(string $uris_scope = null): array
    {
        return array(
            'get' => '/applications/:application_id',
        );
    }

    /**
     * Get Mercado Pago application data
     *
     * Mercado Pago's public API is used to obtain application data using your own credentials.
     *
     * @param string $application_id Ex.: 1234567890
     *
     * @return array The expected return is an array with the same attributes as this class.
     * @throws \Exception Throws an exception on failure to get application data.
     */
    public function getApplicationData(string $application_id)
    {
        $response = parent::read(['application_id' => $application_id], [], true);

        return $response;
    }
}
