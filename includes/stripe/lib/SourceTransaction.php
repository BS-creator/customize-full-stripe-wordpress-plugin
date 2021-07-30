<?php

namespace StripeWPFS;

/**
 * Class SourceTransaction
 *
 * @property string $id
 * @property string $object
 * @property \StripeWPFS\StripeObject $ach_credit_transfer
 * @property int $amount
 * @property int $created
 * @property string $customer_data
 * @property string $currency
 * @property string $type
 *
 * @package StripeWPFS
 */
class SourceTransaction extends ApiResource
{
    const OBJECT_NAME = 'source_transaction';
}
