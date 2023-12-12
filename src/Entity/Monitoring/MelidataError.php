<?php

namespace MercadoPago\PP\Sdk\Entity\Monitoring;

use MercadoPago\PP\Sdk\Common\AbstractEntity;
use MercadoPago\PP\Sdk\Common\Manager;
use MercadoPago\PP\Sdk\Interfaces\RequesterEntityInterface;

/**
 * Handles integration with the Core Monitor service.
 *
 * The purpose of this class is to generate error metrics in Melidata.
 *
 * @property string $name
 * @property string $message
 * @property string $target
 * @property Plugin $plugin
 * @property Platform $platform
 * @property array $details
 *
 * @package MercadoPago\PP\Sdk\Entity\Monitoring
 */
class MelidataError extends AbstractEntity implements RequesterEntityInterface
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $message;

    /**
     * @var string
     */
    protected $target;

    /**
     * @var Plugin
     */
    protected $plugin;

    /**
     * @var Platform
     */
    protected $platform;

    /**
     * @var array
     */
    protected $details;

    /**
     * MelidataError constructor.
     *
     * @param Manager|null $manager
     */
    public function __construct($manager)
    {
        parent::__construct($manager);
        $this->plugin = new Plugin($manager);
        $this->platform = new Platform($manager);
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
            'post' => '/ppcore/prod/monitor/v1/melidata/errors',
        );
    }

    /**
     * Register errors in Melidata using the Core Monitor service API.
     *
     * Once called, it receives a payload with error data and records this error
     * in the metric: application.mpmodules.melidata.error.
     * A status tag is used to indicate success or failure in the registration and enable the application
     * of filters in dashboards that use this metric.
     *
     * To execute this method, it is essential to provide the melidata_error request payload. The payload includes
     * properties such as 'name', 'message', 'target', 'details' among others.
     *
     * The 'details' field receives a map where the key and value are of type string with additional
     * information that needs to be tagged in Datadog according to the needs of the plugin/platform.
     * This information will be tagged and made available to use in Datadog dashboards.
     *
     * Note: This method is inherited from the parent class but specialized for melidata_errors.
     *
     * @return mixed The result of the save operation, typically an instance of ErrorRegisterResponse, with the
     * follow properties: 'code', 'message' and 'status'
     * @throws \Exception Throws an exception if something goes wrong during the save operation.
     */
    public function registerError()
    {
        return parent::save();
    }
}
