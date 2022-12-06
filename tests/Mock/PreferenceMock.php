<?php

namespace MercadoPago\PP\Sdk\Tests\Mock;

/**
 * Class PreferenceMock
 */
class PreferenceMock
{

  const COMPLETE_PREFERENCE = [
    "auto_return" => "approved",
    "back_urls" => [
      "failure" => "http://www.myapp.com/carrinho/?cancel_order=true&order=wc_order&order_id=XX&redirect&_wpnonce=XX",
      "pending" => "http://www.myapp.com/finalizar-compra/order-received/XX/?key=wc_order",
      "success" => "http://www.myapp.com/finalizar-compra/order-received/XX/?key=wc_order"
    ],
    "binary_mode" => false,
    "differential_pricing" => [
      "id"  => ""
    ],
    "external_reference" => "WC-XX",
    "items" => [
      [
        "title" => "Dummy Title",
        "description" => "Dummy description",
        "picture_url" => "http://www.myapp.com/myimage.jpg",
        "category_id" => "car_electronics",
        "quantity" => 1,
        "currency_id" => "U$",
        "unit_price" => 10
      ]
    ],
    "notification_url" => "https://pyppayments.requestcatcher.com/notification",
    "payer" => [
      "address" => [
        "street_name" => "Address - BR - BR",
        "street_number" => "123",
        "zip_code" => "00000-000"
      ],
      "email" => "email@testuser.com",
      "identification" => [
        "number" => "CPF",
        "type" => "376.624.684-45"
      ],
      "name" => "Amadeu",
      "phone" => [
        "area_code" => "",
        "number" => "99999999999"
      ],
      "surname" => "Fontes"
    ],
    "payment_methods" => [
      "excluded_payment_methods" => [
        []
      ],
      "excluded_payment_types" => [
        []
      ],
      "installments" => 1
    ],
    "shipments" => [
      "free_methods" => [
        []
      ],
      "receiver_address" => []
    ],
    "statement_descriptor" => "Mercado Pago",
    "tracks" => [
      [
        "type" => "google_ad"
      ]
    ],
  ];
}
