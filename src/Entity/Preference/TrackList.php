<?php

namespace MercadoPago\PP\Sdk\Entity\Preference;

use MercadoPago\PP\Sdk\Common\AbstractCollection;

/**
 * Class TrackList
 *
 * @package MercadoPago\PP\Sdk\Entity\Preference
 */
class TrackList extends AbstractCollection
{
    public function __construct()
    {
    }

    public function add($entity, $key = null)
    {
        $track = new Track();
        $track->setEntity($entity);
        parent::add($track, $key);
    }

    /**
     * @codeCoverageIgnore
     */
    public function getProperties()
    {
        return get_object_vars($this);
    }
}
