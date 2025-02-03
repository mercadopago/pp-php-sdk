<?php

namespace MercadoPago\PP\Sdk\Entity\Onboarding;

use MercadoPago\PP\Sdk\Common\AbstractEntity;
use MercadoPago\PP\Sdk\Interfaces\RequesterEntityInterface;
use MercadoPago\PP\Sdk\Common\Manager;

/**
 * Class User
 *
 * @property int $id
 * @property string $nickname
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $user_type
 *
 * @package MercadoPago\PP\Sdk\Entity\Onboarding
 */
class User extends AbstractEntity implements RequesterEntityInterface
{
    /**
     * @var int
    */
    protected $id;

    /**
     * @var string
    */
    protected $nickname;

    /**
     * @var string
    */
    protected $first_name;

    /**
     * @var string
    */
    protected $last_name;

    /**
     * @var string
    */
    protected $email;

    /**
     * @var string
    */
    protected $user_type;

    /**
     * User constructor.
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
            'get' => '/users/me',
        );
    }


    /**
     * Get Mercado Pago user data
     *
     * Mercado Pago's public API is used to obtain user data using your own credentials.
     *
     * @return array The expected return is an array with the same attributes as this class.
     * @throws \Exception Throws an exception on failure to get user data.
     */
    public function getUserData()
    {
        return parent::read();
    }
}
