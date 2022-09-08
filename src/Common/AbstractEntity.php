<?php

namespace MercadoPago\PP\Sdk\Common;

use Exception;

/**
 * Class AbstractEntity
 *
 * @package MercadoPago\PP\Sdk\Common
 */
abstract class AbstractEntity implements \JsonSerializable
{
    /**
     * @var object
     */
    private $manager;

    /**
     * @var object
     */
    private $config;

    /**
     * AbstractEntity constructor.
     *
     * @param Manager $manager
     * @param Config $config
     */
    public function __construct($manager, $config)
    {
        $this->manager = $manager;
        $this->config = $config;
    }

    /**
     * @param $name
     *
     * @return mixed
     */
    public function __get($name)
    {
        return $this->{$name};
    }

    /**
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        if (property_exists($this, $name)) {
            $this->{$name} = $value;
        }
    }

    /**
     * @param $data
     */
    public function setData($data)
    {
        foreach ($data as $key => $value) {
            if ($value instanceof AbstractEntity || $value instanceof AbstractCollection) {
                $this->setData($data[$key]);
            } else {
                $this->__set($key, $value);
            }
        }
    }

    /**
     * @codeCoverageIgnore
     */
    public function getProperties()
    {
        return get_object_vars($this);
    }

    /**
     * Get an array from an object
     *
     * @return array
     */
    public function toArray()
    {
        $properties = $this->getProperties();

        $data = [];
        foreach ($properties as $property => $value) {
            if ($value instanceof self) {
                $data[$property] = $value->toArray();
                continue;
            }

            if (($value instanceof \IteratorAggregate) || (is_array($value) && count($value))) {
                foreach ($value as $index => $item) {
                    if ($item instanceof self) {
                        $data[$property][$index] = $item->toArray();
                    } else {
                        $data[$property][$index] = $item;
                    }
                }
                continue;
            }

            $data[$property] = $this->$property;
        }

        return $data;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }

    /**
     * @return mixed
     */
    public function read($params = [])
    {
        $class = get_called_class();
        $entity = new $class();
        $method = 'get';

        $uri = $this->manager->getEntityUri($entity, $method, $params);
        $headers = $this->getDefaultHeader();
        $response = $this->manager->execute($entity, $uri, $method, $headers);

        return $this->handleResponse($response, $method, $entity);
    }

    /**
     * @return mixed
     */
    public function save()
    {
        $method = 'post';

        $uri = $this->manager->getEntityUri($this, $method);
        $additionalHeaders = array(
            'x-product-id' => $this->config->__get('product_id'),
            'x-integrator-id' => $this->config->__get('integrator_id')
        );

        $headers = array_merge($this->getDefaultHeader(), $additionalHeaders);
        $response = $this->manager->execute($this, $uri, $method, $headers);

        return $this->handleResponse($response, $method);
    }

    /**
     * @return array
     */
    public function getDefaultHeader()
    {
        $headers = array(
            'Authorization' => 'Bearer ' . $this->config->__get('access_token'),
            'x-platform-id' => $this->config->__get('platform_id')
        );

        return $headers;
    }

    /**
     * @param Response $response
     * @param $method
     *
     * @return mixed
     */
    public function handleResponse($response, $method, $entity = null)
    {
        if ($response->getStatus() == "200" || $response->getStatus() == "201") {
            $this->setData($response->getData());
            return $method == 'get' ? $entity : true;
        } elseif (intval($response->getStatus()) >= 400 && intval($response->getStatus()) < 500) {
            throw new Exception($response->getData()['message']);
        } else {
            throw new Exception("Internal API Error");
        }
    }
}
