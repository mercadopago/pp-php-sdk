<?php

namespace MercadoPago\PP\Sdk\Tests\Mock;

/**
 * Class PaymentMock
 */
class PaymentMock
{

  public const COMPLETE_PAYMENT = [
    "binary_mode" => false,
    "external_reference" => "WC-105",
    "notification_url" => "https://pyppayments.requestcatcher.com/notification",
    "statement_descriptor" => "TESTSTORE",
    "transaction_amount" => 12,
    "installments" => null,
    "description" => "Flying Ninja x 1",
    "payment_method_id" => "pix",
    "date_of_expiration" => "2022-09-20T22:13:32.000+0000",
    "point_of_interaction" => [
      "type" => "OPENPLATFORM"
    ],
    "payer" => [
      "email" => "test_user_15543629@testuser.com",
      "first_name" => "Test",
      "last_name" => "Customer",
      "identification" => [
        "type" => "CPF",
        "number" => "376.624.684-45"
      ],
      "address" => [
        "street_name" => "Address - BR - BR",
        "street_number" => "123",
        "neighborhood" => "City",
        "city" => "City",
        "federal_unit" => "SP",
        "zip_code" => "00000-000"
      ]
    ],
    "additional_info" => [
      "items" => [
        [
          "id" => 62,
          "title" => "Flying Ninja x 1",
          "description" => "Pellentesque-habitant-morbi-tristique-senectus-et-netus-et-malesuada-fames-ac-turpis-egestas.-Vestibulum-tortor-quam-feugiat-vitae-ultricies-eget-tempor-sit-amet-ante.-Donec-eu-libero-sit-amet-quam-egestas-semper.-Aenean-ultri",
          "picture_url" => "https://woogio-pluginspartners.codeanyapp.com/wp-content/uploads/2020/03/poster_2_up.jpg",
          "category_id" => "computing",
          "quantity" => 1,
          "unit_price" => 12
        ]
      ],
      "payer" => [
        "first_name" => "Test",
        "last_name" => "Customer",
        "phone" => [
          "number" => "11123456789"
        ],
        "address" => [
          "zip_code" => "00000-000",
          "street_name" => "Address - BR / City SP BR"
        ]
      ],
      "shipments" => [
        "receiver_address" => [
          "zip_code" => "",
          "street_name" => "    ",
          "apartment" => ""
        ]
      ]
    ]
  ];
}
