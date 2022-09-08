<?php

namespace MercadoPago\PP\Sdk\Tests\Mock;

/**
 * Class Mock-Preference
 */
class PreferenceMock
{

  public const COMPLETE_PREFERENCE = [
    "additional_info" => "",
    "auto_return" => "approved",
    "back_urls" => [
      "failure" => "https://store.com.br/carrinho/?cancel_order=true&order=wc_order&order_id=XX&redirect&_wpnonce=XX",
      "pending" => "https://store.com.br/finalizar-compra/order-received/XX/?key=wc_order",
      "success" => "https://store.com.br/finalizar-compra/order-received/XX/?key=wc_order"
    ],
    "binary_mode" => false,
    "client_id" => "XX",
    "collector" => [
      "operator_id" => null,
      "tags" => [
        "normal",
        "test_user",
        "messages_as_seller"
      ]
    ],
    "collector_id" => 123,
    "coupon_code" => null,
    "coupon_labels" => null,
    "date_created" => "2022-09-02T15:32:05.973-04:00",
    "date_of_expiration" => null,
    "expiration_date_from" => null,
    "expiration_date_to" => null,
    "expires" => false,
    "external_reference" => "WC-XX",
    "headers" => [
      [
        "name" => "platform_id",
        "value" => "bo2hnr2ic4p001kbgpt0"
      ]
    ],
    "id" => "X123X-X123X-X123X-X123X",
    "init_point" => "https://www.mercadopago.com.br/checkout/v1/redirect?pref_id=X123X-X123X-X123X-X123X",
    "internal_metadata" => null,
    "items" => [
      [
        "category_id" => "others",
        "currency_id" => "BRL",
        "description" => "Pellentesque-habitant-morbi-tristique-senectus-et-netus-et-malesuada-fames-ac-turpis-egestas.-Vestibulum-tortor-quam-feugiat-vitae-ultricies-eget-tempor-sit-amet-ante.-Donec-eu-libero-sit-amet-quam-egestas-semper.-Aenean-ultri",
        "id" => "17",
        "picture_id" => "677999-MLB51392757451_092022",
        "picture_url" => "https://store.com.br/wp-content/uploads/2022/05/beanie-2.jpg",
        "quantity" => 1,
        "title" => "Beanie x 1",
        "unit_price" => 18
      ]
    ],
    "last_updated" => null,
    "live_mode" => true,
    "marketplace" => "NONE",
    "marketplace_fee" => 0,
    "metadata" => [
      "billing_address" => [
        "city_name" => "Osasco",
        "country_name" => "BR",
        "state_name" => "SP",
        "street_name" => "Av. das Nações Unidas, 3003 - Bonfim",
        "zip_code" => "06233-200"
      ],
      "checkout" => "smart",
      "checkout_type" => "redirect",
      "collector" => "XXX",
      "details" => "",
      "module_version" => "6.1.0",
      "platform" => "bo2hnr2ic4p001kbgpt0",
      "platform_version" => "6.5.1",
      "seller_website" => "https://store.com.br/",
      "site_id" => "mlb",
      "sponsor_id" => 208686191,
      "test_mode" => false,
      "user" => [
        "registered_user" => "no",
        "user_email" => null,
        "user_registration_date" => null
      ]
    ],
    "notification_url" => "https://store.com.br/wc-api/WC_WooMercadoPago_Basic_Gateway/?source_news=ipn",
    "operation_type" => "regular_payment",
    "payer" => [
      "address" => [
        "street_name" => "Av. das Nações Unidas, 3003 - Bonfim  Osasco SP BR",
        "street_number" => null,
        "zip_code" => "06233-200"
      ],
      "date_created" => null,
      "email" => "email@testuser.com",
      "identification" => [
        "number" => "",
        "type" => ""
      ],
      "last_purchase" => null,
      "name" => "Amadeu",
      "phone" => [
        "area_code" => "",
        "number" => "99999999999"
      ],
      "surname" => "Fontes"
    ],
    "payment_methods" => [
      "default_card_id" => null,
      "default_installments" => null,
      "default_payment_method_id" => null,
      "excluded_payment_methods" => [
        [
          "id" => ""
        ]
      ],
      "excluded_payment_types" => [
        [
          "id" => ""
        ]
      ],
      "installments" => 1
    ],
    "processing_modes" => null,
    "product_id" => null,
    "purpose" => "",
    "redirect_urls" => [
      "failure" => "",
      "pending" => "",
      "success" => ""
    ],
    "sandbox_init_point" => "https://sandbox.mercadopago.com.br/checkout/v1/redirect?pref_id=X123X-X123X-X123X-X123X",
    "shipments" => [
      "default_shipping_method" => null,
      "receiver_address" => [
        "apartment" => "",
        "city_name" => "Osasco",
        "country_name" => "",
        "floor" => "",
        "state_name" => "SP",
        "street_name" => "Av. das Nações Unidas, 3003 - Bonfim  Osasco SP BR",
        "street_number" => "",
        "zip_code" => "06233-200"
      ]
    ],
    "site_id" => "MLB",
    "statement_descriptor" => "Mercado Pago",
    "total_amount" => 18
  ];
}
