<?php

namespace MercadoPago\PP\Sdk\Tests\Unit\Mock;

/**
 * Class OnboardingMock
 */
class OnboardingMock
{

  const ONBOARDING_DATA = [
    "application" => [
        "name" => "test_application",
        "description" => "Test application",
        "site_id" => "MLA",
        "access_token" => "test",
        "test_access_token" => "test",
        "sandbox_mode" => true,
        "active" => true,
        "scopes" => [
            "test",
            "test2"
        ],
        "thumbnail" => "test_thumbnail"
    ],
    "user" => [
        "id" => 123456789,
        "nickname" => "test_user",
        "first_name" => "Test",
        "last_name" => "User",
        "email" => "t@t.io",
        "user_type" => "normal",
    ],
  ];
}
