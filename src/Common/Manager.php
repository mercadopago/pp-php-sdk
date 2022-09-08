<?php

namespace MercadoPago\PP\Sdk\Common;

use MercadoPago\PP\Sdk\HttpClient;

/**
 * Class Manager
 *
 * @package MercadoPago\PP\Sdk\Common
 */
class Manager
{
    /**
     * @var HttpClient
     */
    private $client;

    /**
     * Manager constructor.
     *
     * @param HttpClient $client
     */
    public function __construct($client)
    {
        $this->client = $client;
    }

    /**
     * @param        $entity
     * @param string $uri
     *
     * @return mixed
     */
    public function execute($entity, $uri, $method = 'get', $headers = [])
    {
        if ($method == 'get') {
            return $this->client->{$method}($uri, $headers);
        }

        $body = $entity->jsonSerialize();
        return $this->client->{$method}($uri, $headers, $body);
    }

    /**
     * @param $entity
     * @param $method
     *
     * @return string
     */
    public function getEntityUri($entity, $method, $params = [])
    {
        if (!method_exists($entity, 'getUris')) {
            throw new \Exception('Method not available for ' . get_class($entity) . ' entity');
        }

        $uri = $entity->getUris()[$method];
        $matches = [];
        preg_match_all('/\\:\\w+/', $uri, $matches);

        foreach ($matches[0] as $match) {
            $key = substr($match, 1);

            if (array_key_exists($key, $params)) {
                $uri = str_replace($match, $params[$key], $uri);
            } else {
                $uri = str_replace($match, $entity->{$key}, $uri);
            }
        }

        return $uri;
    }
}
