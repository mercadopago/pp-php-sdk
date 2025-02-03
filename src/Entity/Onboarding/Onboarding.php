<?php

namespace MercadoPago\PP\Sdk\Entity\Onboarding;

use MercadoPago\PP\Sdk\Common\AbstractEntity;
use MercadoPago\PP\Sdk\Interfaces\RequesterEntityInterface;
use MercadoPago\PP\Sdk\Common\Manager;

/**
 * Class Onboarding
 *
 * @property User $user
 * @property Application $application
 *
 * @package MercadoPago\PP\Sdk\Entity\Onboarding
*/
class Onboarding extends AbstractEntity implements RequesterEntityInterface
{
    /**
     * @var User
    */
    protected $user;

    /**
     * @var Application
    */
    protected $application;

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
        return array();
    }

    /**
     * Get onboarding data.
     *
     * This method returns the onboarding data of the user and the application.
     *
     * @param string $application_id
     *
     * @return array The expected return is an array with the same attributes as this class.
     * @throws \Exception Throws an exception on failure to get onboarding data.
    */
    public function getOnboardingData(string $application_id)
    {
        $applicationEntity = new Application($this->manager);
        $userEntity = new User($this->manager);

        $applicationData = $applicationEntity->getApplicationData($application_id);
        $userData = $userEntity->getUserData();

        return [
            'application' => $applicationData,
            'user' => $userData,
        ];
    }
}
