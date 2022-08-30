<?php

namespace MercadoPago\PP\Sdk\Common;

use Exception;

/**
 * Class AbstractEntity
 *
 * @package MercadoPago\PP\Sdk\Common
 */
abstract class AbstractEntity
{
    /**
     * AbstractEntity constructor
     * 
     * @throws \Exception
     */
    public function __construct()
    {
    }

    /**
     * @param $name
     *
     * @return mixed
     */
    public function get($name)
    {
        return $this->{$name};
    }

    /**
     * @param $name
     * @param $value
     *
     */
    public function set($name, $value)
    {
        if ($this->propertyExists($name)) {
            $this->{$name} = $value;
        }
    }

    /**
     * @param $property
     *
     * @return bool
     */
    protected function propertyExists($property)
    {
        return array_key_exists($property, get_object_vars($this));
    }

    /**
     * Fill entity from data with nested object creation
     *
     * @param $entity
     * @param $data
     */
    protected function fillFromArray($entity, $data)
    {
        if ($data) {
            foreach ($data as $key => $value) {
                if (!is_null($value)) {
                    if (is_array($value)) {
                        $className = 'MercadoPago\\PP\\Sdk\\' . $this->camelize($key);
                        if (class_exists($className, true)) {
                            $entity->setValue($key, new $className);
                            $entity->fillFromArray($this->{$key}, $value);
                        } else {
                            $entity->setValue($key, json_decode(json_encode($value)));
                        }
                        continue;
                    }
                    $entity->setValue($key, $value);
                }
            }
        }
    }

    /**
     * @param        $input
     * @param string $separator
     *
     * @return mixed
     */
    protected function camelize($input, $separator = '_')
    {
        return str_replace($separator, '', ucwords($input, $separator));
    }

    /**
     * @param null $attributes
     *
     * @return array
     */
    public function toArray($attributes = null)
    {
        $result = null;

        if (is_null($attributes)) {
            $result = get_object_vars($this);
        } else {
            $result = array_intersect_key(get_object_vars($this), $attributes);
        }

        foreach ($result as $key => $value) {
            if (!is_bool($value) && empty($value)) {
                unset($result[$key]);
            }
        }

        return $result;
    }

    /**
     * @param $entity
     * @param $result
     * @return mixed
     */
    protected function attributesToJson($entity, $result)
    {
        if (is_array($entity)) {
            $attributes = array_filter($entity, function ($entity) {
                return ($entity !== null && $entity !== false && $entity !== '');
            });
        } else {
            $attributes = $entity->toArray();
        }

        foreach ($attributes as $key => $value) {
            if ($value instanceof AbstractEntity || is_array($value)) {
                $this->attributesToJson($value, $result[$key]);
            } else {
                if ($value != null || is_bool($value) || is_numeric($value)) {
                    $result[$key] = $value;
                }
            }
        }

        return json_encode($result);
    }
}
