<?php

namespace StripeWPFS\Issuing;

/**
 * Class Dispute
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $amount Disputed amount. Usually the amount of the <code>disputed_transaction</code>, but can differ (usually because of currency fluctuation or because only part of the order is disputed).
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $currency The currency the <code>disputed_transaction</code> was made in.
 * @property string|\StripeWPFS\Issuing\Transaction $disputed_transaction The transaction being disputed.
 * @property \StripeWPFS\StripeObject $evidence
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property \StripeWPFS\StripeObject $metadata Set of key-value pairs that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property string $reason Reason for this dispute. One of <code>fraudulent</code> or <code>other</code>.
 * @property string $status Current status of dispute. One of <code>unsubmitted</code>, <code>under_review</code>, <code>won</code>, or <code>lost</code>.
 *
 * @package StripeWPFS\Issuing
 */
class Dispute extends \StripeWPFS\ApiResource
{
    const OBJECT_NAME = 'issuing.dispute';

    use \StripeWPFS\ApiOperations\All;
    use \StripeWPFS\ApiOperations\Create;
    use \StripeWPFS\ApiOperations\Retrieve;
    use \StripeWPFS\ApiOperations\Update;
}
