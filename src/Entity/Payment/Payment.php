<?php

namespace MercadoPago\PP\Sdk\Entity\Payment;

use MercadoPago\PP\Sdk\Common\AbstractEntity;

/**
 * Class Payment
 *
 * @package MercadoPago\PP\Sdk\Entity
 */
class Payment extends AbstractEntity
{
   /**
    * @var string
    */
   public $description;

   /**
    * @var string
    */
   public $external_reference;

   /**
    * @var string
    */
   public $notification_url;

   /**
    * @var int
    */
   public $installments;

   /**
    * @var double
    */
   public $transaction_amount;

   /**
    * @var string
    */
   public $payment_method_id;

   /**
    * @var string
    */
   public $statement_descriptor;

   /**
    * @var boolean
    */
   public $binary_mode;

   /**
    * @var Date|string
    */
   public $date_of_expiration;

   /**
    * @var string
    */
   public $callback_url;

   /**
    * @var string
    */
   public $token;

   /**
    * @var string
    */
   public $issuer_id;

   /**
    * @var string
    */
   public $campaign_id;

   /**
    * @var double
    */
   public $coupon_amount;

   /**
    * @var string
    */
   public $coupon_code;

   /**
    * @var Payer
    */
   public $payer;

   /**
    * @var AdditionalInfo
    */
   public $additional_info;

   /**
    * @var TransactionDetails
    */
   public $transaction_details;

   /**
    * @var PointOfInteraction
    */
   public $point_of_interaction;

   /**
    * @var object
    */
   public $metadata;

   public function __construct($manager, $config)
   {
      parent::__construct($manager, $config);
      $this->payer = new Payer();
      $this->additional_info = new AdditionalInfo();
      $this->transaction_details = new TransactionDetails();
      $this->point_of_interaction = new PointOfInteraction();
   }

   /**
    * @codeCoverageIgnore
    */
   public function getProperties()
   {
      return get_object_vars($this);
   }

   /**
    * @return array
    */
   public function getUris()
   {
      $uris = array(
         'post' => '/beta/asgard/payments',
      );

      return $uris;
   }
}
