<?php

namespace StripeWPFS;

/**
 * Class SetupIntent
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property string|\StripeWPFS\StripeObject|null $application ID of the Connect application that created the SetupIntent.
 * @property string|null $cancellation_reason Reason for cancellation of this SetupIntent, one of <code>abandoned</code>, <code>requested_by_customer</code>, or <code>duplicate</code>.
 * @property string|null $client_secret <p>The client secret of this SetupIntent. Used for client-side retrieval using a publishable key.</p><p>The client secret can be used to complete payment setup from your frontend. It should not be stored, logged, embedded in URLs, or exposed to anyone other than the customer. Make sure that you have TLS enabled on any page that includes the client secret.</p>
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string|\StripeWPFS\Customer|null $customer <p>ID of the Customer this SetupIntent belongs to, if one exists.</p><p>If present, payment methods used with this SetupIntent can only be attached to this Customer, and payment methods attached to other Customers cannot be used with this SetupIntent.</p>
 * @property string|null $description An arbitrary string attached to the object. Often useful for displaying to users.
 * @property \StripeWPFS\ErrorObject|null $last_setup_error The error encountered in the previous SetupIntent confirmation.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string|\StripeWPFS\Mandate|null $mandate ID of the multi use Mandate generated by the SetupIntent.
 * @property \StripeWPFS\StripeObject $metadata Set of key-value pairs that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property \StripeWPFS\StripeObject|null $next_action If present, this property tells you what actions you need to take in order for your customer to continue payment setup.
 * @property string|\StripeWPFS\Account|null $on_behalf_of The account (if any) for which the setup is intended.
 * @property string|\StripeWPFS\PaymentMethod|null $payment_method ID of the payment method used with this SetupIntent.
 * @property \StripeWPFS\StripeObject|null $payment_method_options Payment-method-specific configuration for this SetupIntent.
 * @property string[] $payment_method_types The list of payment method types (e.g. card) that this SetupIntent is allowed to set up.
 * @property string|\StripeWPFS\Mandate|null $single_use_mandate ID of the single_use Mandate generated by the SetupIntent.
 * @property string $status <a href="https://stripe.com/docs/payments/intents#intent-statuses">Status</a> of this SetupIntent, one of <code>requires_payment_method</code>, <code>requires_confirmation</code>, <code>requires_action</code>, <code>processing</code>, <code>canceled</code>, or <code>succeeded</code>.
 * @property string $usage <p>Indicates how the payment method is intended to be used in the future.</p><p>Use <code>on_session</code> if you intend to only reuse the payment method when the customer is in your checkout flow. Use <code>off_session</code> if your customer may or may not be in your checkout flow. If not provided, this value defaults to <code>off_session</code>.</p>
 *
 * @package StripeWPFS
 */
class SetupIntent extends ApiResource
{
    const OBJECT_NAME = 'setup_intent';

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Retrieve;
    use ApiOperations\Update;

    /**
     * These constants are possible representations of the status field.
     *
     * @see https://stripe.com/docs/api/setup_intents/object#setup_intent_object-status
     */
    const STATUS_CANCELED                = 'canceled';
    const STATUS_PROCESSING              = 'processing';
    const STATUS_REQUIRES_ACTION         = 'requires_action';
    const STATUS_REQUIRES_CONFIRMATION   = 'requires_confirmation';
    const STATUS_REQUIRES_PAYMENT_METHOD = 'requires_payment_method';
    const STATUS_SUCCEEDED               = 'succeeded';

    /**
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @throws \StripeWPFS\Exception\ApiErrorException if the request fails
     *
     * @return SetupIntent The canceled setup intent.
     */
    public function cancel($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/cancel';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);
        return $this;
    }

    /**
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @throws \StripeWPFS\Exception\ApiErrorException if the request fails
     *
     * @return SetupIntent The confirmed setup intent.
     */
    public function confirm($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/confirm';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);
        return $this;
    }
}
