<?php

namespace MercadoPago\PP\Sdk\Entity\Payment;

use MercadoPago\PP\Sdk\Common\AbstractEntity;

/**
 * Class TransactionDetails
 *
 * @property string $financial_institution
 * @property string $verification_code
 * @property string $bank_transfer_id
 * @property string $transaction_id
 *
 * @package MercadoPago\PP\Sdk\Entity\Payment
 */
class TransactionDetails extends AbstractEntity
{
    /**
     * @var string
     */
    protected $financial_institution;

    /**
     * @var string
     */
    protected $verification_code;

    /**
     * @var string
     */
    protected $bank_transfer_id;

    /**
     * @var string
     */
    protected $transaction_id;
}
