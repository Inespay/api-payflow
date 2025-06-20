<?php

namespace inespayPayments\api\payflow;

use Illuminate\Support\Facades\Log;
use inespayPayments\api\payflow\requests\BankRequest;
use inespayPayments\api\payflow\requests\MetricsTopBanksRequest;
use inespayPayments\api\payflow\requests\PeriodicCancelRequest;
use inespayPayments\api\payflow\requests\PeriodicInitRequest;
use inespayPayments\api\payflow\requests\RefundRequest;
use inespayPayments\api\payflow\requests\SingleInitRequest;
use inespayPayments\api\payflow\requests\SinglePayinRequest;
use inespayPayments\api\payflow\requests\SinglePayinResendNotificationRequest;
use inespayPayments\api\payflow\requests\XmlRefundRequest;
use inespayPayments\api\payflow\responses\BankResponse;
use inespayPayments\api\payflow\responses\PeriodicCancelResponse;
use inespayPayments\api\payflow\responses\PeriodicInitResponse;
use inespayPayments\api\payflow\responses\PeriodicPayinResponse;
use inespayPayments\api\payflow\responses\RefundResponse;
use inespayPayments\api\payflow\responses\SingleInitResponse;
use inespayPayments\api\payflow\responses\SinglePayinNotificationResponse;
use inespayPayments\api\payflow\responses\SinglePayinResendNotificationResponse;
use inespayPayments\api\payflow\responses\SinglePayinResponse;
use inespayPayments\api\payflow\responses\SinglePayinsResponse;
use inespayPayments\api\payflow\responses\SinglePayinTransactionsResponse;
use inespayPayments\api\payflow\responses\XmlRefundResponse;
use inespayPayments\api\payflow\requests\MetricsTotalsRequest;
use inespayPayments\api\payflow\requests\PeriodicPayinFileRequest;
use inespayPayments\api\payflow\requests\PeriodicPayinRequest;
use inespayPayments\api\payflow\requests\PeriodicPayinResendNotificationRequest;
use inespayPayments\api\payflow\requests\SinglePayinFileRequest;
use inespayPayments\api\payflow\responses\MetricsTopBanksResponse;
use inespayPayments\api\payflow\responses\MetricsTotalsResponse;
use inespayPayments\api\payflow\responses\PeriodicPayinNotificationResponse;
use inespayPayments\api\payflow\responses\PeriodicPayinResendNotificationResponse;
use inespayPayments\api\payflow\responses\PeriodicPayinsFileResponse;
use inespayPayments\api\payflow\responses\PeriodicPayinsResponse;
use inespayPayments\api\payflow\responses\PeriodicPayinTransactionsResponse;
use inespayPayments\api\payflow\responses\SinglePayinsFileResponse;

class InespayApiPublic extends InespayApiBase
{
    public const SINGLE_PAINS_INIT_ENDPOINT = '/payins/single/init';

    public const SINGLE_PAYINS_INFO_ENDPOINT = '/payins/single';

    public const SINGLE_PAYINS_FILE_ENDPOINT = '/payins/single/file';

    public const SINGLE_PAYINS_NOTIFICATIONS_ENDPOINT = '/payins/single/notifications';

    public const SINGLE_PAYINS_RESEND_NOTIFICATIONS_ENDPOINT = '/payins/single/notifications/resend';

    public const SINGLE_PAYINS_TRANSACTIONS_ENDPOINT = '/payins/single/transactions';

    public const SINGLE_PAYINS_METRICS_TOTALS_ENDPOINT = '/payins/single/metrics/totals';

    public const SINGLE_PAYINS_METRICS_TOP_BANKS_ENDPOINT = '/payins/single/metrics/top-banks';

    public const PERIODIC_PAYIN_INIT_ENDPOINT = '/payins/periodic/init';

    public const PERIODIC_PAYIN_INFO_ENDPOINT = '/payins/periodic';

    public const PERIODIC_PAYIN_FILE_ENDPOINT = '/payins/periodic/file';

    public const PERIODIC_PAYIN_CANCEL_ENDPOINT = '/payins/periodic/cancel';

    public const PERIODIC_PAYINS_NOTIFICATIONS_ENDPOINT = '/payins/periodic/notifications';

    public const PERIODIC_PAYINS_RESEND_NOTIFICATIONS_ENDPOINT = '/payins/periodic/notifications/resend';

    public const PERIODIC_PAYINS_TRANSACTIONS_ENDPOINT = '/payins/periodic/transactions';

    public const SINGLE_PAYIN_REFUND_ENDPOINT = '/refunds/init';

    public const SINGLE_PAYINS_REFUND_SEPA_XML = '/refunds/sepa-xml';

    public const BANKS_ENDPOINT =  '/banks';

    public const SCHEME_STANDARD_TRANSFER = 'SCT';

    public const SCHEME_INSTANT_TRANSFER = 'SCT-INST';

    private $ALG_HASH = 'sha256';

    private $subject = null;

    private $amount = null;

    private $reference = null;

    private $urlOk = null;

    private $urlError = null;

    private $urlNotif = null;

    private $accountDestiny = null;

    private $holderDestiny = null;

    private $expireMinutes = 30; //Default

    private $customData = null;

    private $partnerId = null;

    private $bankIdSelected = null;

    private $frequency = null;

    private $debtorAccount = null;

    private $startDate = null;

    private $endDate = null;

    private $debtId = null;

    private $executionRule = null;

    private $dayOfExecution = null;

    private $debtorIdFromBank = null;

    private $debtorBic = null;

    private $debtorIban = null;

    private $debtorName = null;

    private $debtorPaymentOrders = null;

    private $batchBooking = false;

    private $dataReturn = null;

    private $dataReturnDecode = null;

    private $dataReturnJson = null;

    private $signatureDataReturn = null;

    private $customRecipient = null;

    private $scheme = null;

    /**
     * @throws \Exception
     */
    public function wakeup(): bool
    {
        $okWakeup = false;
        foreach (range(0, 4) as $value) {
            $response = parent::apiRequest([], '/wakeup');

            if (
                isset($response->status)
                && $response->status == parent::STATUS_CODE_SUCCESS
            ) {
                $okWakeup = true;
                break;
            }
        }

        return $okWakeup;
    }

    public function generateSimplePaymentUrl(SingleInitRequest $singleInitRequest): SingleInitResponse
    {
        $singleInitRequest->setAmount(self::convertAmount($singleInitRequest->getAmount()));
        $singleInitRequestArray = json_decode(json_encode($singleInitRequest), true);
        $singleInitRequestWithoutNulls = array_filter((array) $singleInitRequestArray, [$this, "filterToRemoveNullValues"]); //Eliminamos los valores nulos, vacios..

        $response = parent::apiRequest($singleInitRequestWithoutNulls, self::SINGLE_PAINS_INIT_ENDPOINT);

        return new SingleInitResponse($response);
    }

    public static function convertAmount(float $amount): int
    {
        $amountConverted = null;
        if (is_numeric($amount)) {
            $amountConverted = number_format($amount, 2, '.', '');
            $amountConverted = str_replace('.', '', $amountConverted);
        }

        return $amountConverted;
    }

    public function getAmount()
    {
        return ($this->amount / 100);
    }

    public function setAmount($amount)
    {
        if ($amount != null) {
            if (is_numeric($amount)) {
                $amountConverted = number_format($amount, 2, '.', '');
                $amountConverted = str_replace('.', '', $amountConverted);
                $this->amount = $amountConverted;
            } else {
                die('Error: Amount is not a number.');
            }
        } else {
            die('Error: Amount cannot be null.');
        }
    }

    /**
     * @throws \Exception
     */
    public function generatePeriodicPaymentUrl(PeriodicInitRequest $periodicInitRequest): PeriodicInitResponse
    {
        $periodicInitRequest->setAmount(self::convertAmount($periodicInitRequest->getAmount()));
        $periodicInitRequestArray = json_decode(json_encode($periodicInitRequest), true);
        $periodicInitRequestWithoutNulls = array_filter((array) $periodicInitRequestArray, [$this, "filterToRemoveNullValues"]); //Eliminamos los valores nulos, vacios..

        $response = parent::apiRequest($periodicInitRequestWithoutNulls, self::PERIODIC_PAYIN_INIT_ENDPOINT);

        return new PeriodicInitResponse($response);
    }

    /**
     * @throws \Exception
     */
    public function generateCancelPeriodicPaymentUrl(PeriodicCancelRequest $periodicCancelRequest): PeriodicCancelResponse
    {
        $periodicCancelRequestArray = json_decode(json_encode($periodicCancelRequest), true);
        $periodicCancelRequestWithoutNulls = array_filter((array) $periodicCancelRequestArray, [$this, "filterToRemoveNullValues"]); //Eliminamos los valores nulos, vacios..

        $response = parent::apiRequest($periodicCancelRequestWithoutNulls, self::PERIODIC_PAYIN_CANCEL_ENDPOINT);

        return new PeriodicCancelResponse($response);
    }

    /**
     * @throws \Exception
     */
    public function generateXmlRefund(XmlRefundRequest $xmlRefundRequest): XmlRefundResponse
    {
        $xmlRefundRequestArray = json_decode(json_encode($xmlRefundRequest), true);
        $xmlRefundRequestWithoutNulls = array_filter((array) $xmlRefundRequestArray, [$this, "filterToRemoveNullValues"]); //Eliminamos los valores nulos, vacios..

        $response = parent::apiRequest($xmlRefundRequestWithoutNulls, self::SINGLE_PAYINS_REFUND_SEPA_XML);

        return new XmlRefundResponse($response);
    }

    /**
     * @throws \Exception
     */
    public function generateRefund(RefundRequest $refundRequest): RefundResponse
    {
        $refundRequest->setAmount(self::convertAmount($refundRequest->getAmount()));
        $refundRequestArray = json_decode(json_encode($refundRequest), true);
        $refundRequestWithoutNulls = array_filter((array) $refundRequestArray, [$this, "filterToRemoveNullValues"]); //Eliminamos los valores nulos, vacios..

        $response = parent::apiRequest($refundRequestWithoutNulls, self::SINGLE_PAYIN_REFUND_ENDPOINT);
        return new RefundResponse($response);
    }

    /**
     * @throws \Exception
     */
    public function getSinglePayins(SinglePayinRequest $singlePayinRequest): SinglePayinsResponse
    {
        $singlePayinRequestArray = json_decode(json_encode($singlePayinRequest), true);
        $singlePayinRequestWithoutNulls = array_filter((array) $singlePayinRequestArray, [$this, "filterToRemoveNullValues"]); //Eliminamos los valores nulos, vacios..

        $response = parent::apiRequest($singlePayinRequestWithoutNulls, self::SINGLE_PAYINS_INFO_ENDPOINT, self::GET_HTTP);
        return new SinglePayinsResponse($response);

    }

    /**
     * @throws \Exception
     */
    public function getSinglePayinsFile(SinglePayinFileRequest $singlePayinFileRequest): SinglePayinsFileResponse
    {
        $singlePayinFileRequestArray = json_decode(json_encode($singlePayinFileRequest), true);
        $singlePayinFileRequestWithoutNulls = array_filter((array) $singlePayinFileRequestArray, [$this, "filterToRemoveNullValues"]); //Eliminamos los valores nulos, vacios..

        $response = parent::apiRequest($singlePayinFileRequestWithoutNulls, self::SINGLE_PAYINS_FILE_ENDPOINT, self::GET_HTTP);
        return new SinglePayinsFileResponse($response);

    }

    /**
     * @throws \Exception
     */
    public function getPeriodicPayins(PeriodicPayinRequest $periodicPayinRequest): PeriodicPayinsResponse
    {
        $periodicPayinRequestArray = json_decode(json_encode($periodicPayinRequest), true);
        $periodicPayinRequestWithoutNulls = array_filter((array) $periodicPayinRequestArray, [$this, "filterToRemoveNullValues"]); //Eliminamos los valores nulos, vacios..

        $response = parent::apiRequest($periodicPayinRequestWithoutNulls, self::PERIODIC_PAYIN_INFO_ENDPOINT, self::GET_HTTP);
        return new PeriodicPayinsResponse($response);

    }

    /**
     * @throws \Exception
     */
    public function getPeriodicPayinsFile(PeriodicPayinFileRequest $periodicPayinFileRequest): PeriodicPayinsFileResponse
    {
        $periodicPayinFileRequestArray = json_decode(json_encode($periodicPayinFileRequest), true);
        $periodicPayinFileRequestWithoutNulls = array_filter((array) $periodicPayinFileRequestArray, [$this, "filterToRemoveNullValues"]); //Eliminamos los valores nulos, vacios..

        $response = parent::apiRequest($periodicPayinFileRequestWithoutNulls, self::PERIODIC_PAYIN_FILE_ENDPOINT, self::GET_HTTP);
        return new PeriodicPayinsFileResponse($response);

    }

    public function getSinglePayinDetail($singlePayinId): SinglePayinResponse
	{
		$dataParams = [];
		$response = parent::apiRequest($dataParams, self::SINGLE_PAYINS_INFO_ENDPOINT . '/' . $singlePayinId, self::GET_HTTP);
		return new SinglePayinResponse($response);
	}

    public function getPeriodicPayinDetail($periodicPayinId): PeriodicPayinResponse
	{
		$dataParams = [];
		$response = parent::apiRequest($dataParams, self::PERIODIC_PAYIN_INFO_ENDPOINT . '/' . $periodicPayinId, self::GET_HTTP);
		return new PeriodicPayinResponse($response);
	}

    public function setSubject($subject)
    {
        if ($subject != null) {
            if (! empty($subject)) {
                $this->subject = trim($subject);
            } else {
                die('Error: subject cannot be empty.');
            }
        } else {
            die('Error: subject cannot be null.');
        }
    }

    public function getReference()
    {
        return $this->reference;
    }

    public function setReference($reference)
    {
        if ($reference != null) {
            if (! empty($reference)) {
                $this->reference = trim($reference);
            } else {
                die('Error: reference cannot be empty.');
            }
        } else {
            die('Error: reference cannot be null.');
        }
    }

    public function setUrlOk($urlOk)
    {
        if ($urlOk != null) {
            if (! empty($urlOk)) {
                $this->urlOk = trim($urlOk);
            } else {
                die('Error: urlOk cannot be empty.');
            }
        } else {
            die('Error: urlOk cannot be null.');
        }
    }

    public function setUrlError($urlError)
    {
        if ($urlError != null) {
            if (! empty($urlError)) {
                $this->urlError = trim($urlError);
            } else {
                die('Error: urlError cannot be empty.');
            }
        } else {
            die('Error: urlError cannot be null.');
        }
    }

    public function setUrlNotif($urlNotif)
    {
        if ($urlNotif != null) {
            if (! empty($urlNotif)) {
                $this->urlNotif = trim($urlNotif);
            } else {
                die('Error: urlNotif cannot be empty.');
            }
        } else {
            die('Error: urlNotif cannot be null.');
        }
    }

    public function setAccountDestiny($accountDestiny)
    {
        if ($accountDestiny != null) {
            if (! empty($accountDestiny)) {
                $this->accountDestiny = trim($accountDestiny);
            } else {
                die('Error: accountDestiny cannot be empty.');
            }
        } else {
            die('Error: accountDestiny cannot be null.');
        }
    }

    public function setHolderDestiny($holderDestiny)
    {
        if ($holderDestiny != null) {
            if (! empty($holderDestiny)) {
                $this->holderDestiny = trim($holderDestiny);
            } else {
                die('Error: holderDestiny cannot be empty.');
            }
        } else {
            die('Error: holderDestiny cannot be null.');
        }
    }

    public function setExpireMinutes($expireMinutes)
    {
        if ($expireMinutes != null) {
            if (is_numeric($expireMinutes)) {
                $this->expireMinutes = $expireMinutes;
            } else {
                die('Error: expireMinutes is not a number.');
            }
        } else {
            die('Error: expireMinutes cannot be null.');
        }
    }

    public function setCustomData($customData)
    {
        if ($customData != null) {
            if (! empty($customData)) {
                $this->customData = $customData;
            } else {
                die('Error: customData cannot be empty.');
            }
        } else {
            die('Error: customData cannot be null.');
        }
    }

    public function setPartnerId($partnerId)
    {
        if ($partnerId != null) {
            if (! empty($partnerId)) {
                $this->partnerId = $partnerId;
            } else {
                die('Error: partnerId cannot be empty.');
            }
        } else {
            die('Error: partnerId cannot be null.');
        }
    }

    public function setFrequency($frequency)
    {
        if ($frequency != null) {
            if (! empty($frequency)) {
                $this->frequency = $frequency;
            } else {
                die('Error: frequency cannot be empty.');
            }
        } else {
            die('Error: frequency cannot be null.');
        }
    }

    public function setDebtorAccount($debtorAccount)
    {
        if ($debtorAccount != null) {
            if (! empty($debtorAccount)) {
                $this->debtorAccount = $debtorAccount;
            } else {
                die('Error: debtorAccount cannot be empty.');
            }
        } else {
            die('Error: debtorAccount cannot be null.');
        }
    }

    public function setStartDate($startDate)
    {
        if ($startDate != null) {
            if (! empty($startDate)) {
                $this->startDate = $startDate;
            } else {
                die('Error: startDate cannot be empty.');
            }
        } else {
            die('Error: startDate cannot be null.');
        }
    }

    public function setEndDate($endDate)
    {
        if ($endDate != null) {
            if (! empty($endDate)) {
                $this->endDate = $endDate;
            } else {
                die('Error: endDate cannot be empty.');
            }
        } else {
            die('Error: endDate cannot be null.');
        }
    }

    public function setBankIdSelected($bankIdSelected)
    {
        if ($bankIdSelected != null) {
            if (! empty($bankIdSelected)) {
                $this->bankIdSelected = trim($bankIdSelected);
            } else {
                die('Error: bankIdSelected cannot be empty.');
            }
        } else {
            die('Error: bankIdSelected cannot be null.');
        }
    }

    public function setDebtId($debtId)
    {
        if ($debtId != null) {
            if (! empty($debtId)) {
                $this->debtId = trim($debtId);
            } else {
                die('Error: debtId cannot be empty.');
            }
        } else {
            die('Error: debtId cannot be null.');
        }
    }

    public function setDebtorIdFromBank($debtorIdFromBank)
    {
        if ($debtorIdFromBank != null) {
            if (! empty($debtorIdFromBank)) {
                $this->debtorIdFromBank = trim($debtorIdFromBank);
            } else {
                die('Error: debtorIdFromBank cannot be empty.');
            }
        } else {
            die('Error: debtorIdFromBank cannot be null.');
        }
    }

    public function setDebtorBic($debtorBic)
    {
        if ($debtorBic != null) {
            if (! empty($debtorBic)) {
                $this->debtorBic = trim($debtorBic);
            } else {
                die('Error: debtorBic cannot be empty.');
            }
        } else {
            die('Error: debtorBic cannot be null.');
        }
    }

    public function setDebtorIban($debtorIban)
    {
        if ($debtorIban != null) {
            if (! empty($debtorIban)) {
                $this->debtorIban = trim($debtorIban);
            } else {
                die('Error: debtorIban cannot be empty.');
            }
        } else {
            die('Error: debtorIban cannot be null.');
        }
    }

    public function setDebtorName($debtorName)
    {
        if ($debtorName != null) {
            if (! empty($debtorName)) {
                $this->debtorName = trim($debtorName);
            } else {
                die('Error: debtorName cannot be empty.');
            }
        } else {
            die('Error: debtorName cannot be null.');
        }
    }

    public function setBatchBooking($batchBooking)
    {
        if (is_bool($batchBooking)) {
            $this->batchBooking = $batchBooking;
        } else {
            die('Error: batchBooking must be a boolean.');
        }
    }

    public function setDebtorPaymentOrders($debtorPaymentOrders)
    {
        if ($debtorPaymentOrders != null) {
            if (! empty($debtorPaymentOrders)) {
                $this->debtorPaymentOrders = $debtorPaymentOrders;
            } else {
                die('Error: debtorPaymentOrders cannot be empty.');
            }
        } else {
            die('Error: debtorPaymentOrders cannot be null.');
        }
    }

    public function setDataReturn($dataReturnBase64)
    {
        if ((! empty($dataReturnBase64))) {
            $this->dataReturn = $dataReturnBase64;
            $this->dataReturnDecode = $this->decodeBase64($this->dataReturn);

            $this->dataReturnJson = json_decode($this->dataReturnDecode, true);
        } else {
            die('Error: dataReturn cannot be null or empty.');
        }
    }

    private function decodeBase64($data)
    {
        return base64_decode($data);
    }

    public function getStatusFromDataReturn()
    {
        return $this->dataReturnJson['codStatus'];
    }

    public function getDescriptionFromDataReturn()
    {
        return $this->dataReturnJson['description'];
    }

    public function getSinglePayinIdFromDataReturn()
    {
        return $this->dataReturnJson['singlePayinId'];
    }

    public function getAmountFromDataReturn()
    {
        return $this->dataReturnJson['amount'];
    }

    public function getReferenceFromDataReturn()
    {
        return $this->dataReturnJson['reference'];
    }

    public function getDebtorNameFromDataReturn()
    {
        return $this->dataReturnJson['debtorName'];
    }

    public function getDebtorAccountFromDataReturn()
    {
        return $this->dataReturnJson['debtorAccount'];
    }

    public function getCustomDataFromDataReturn()
    {
        if (array_key_exists('customData', $this->dataReturnJson)) {
            return $this->dataReturnJson['customData'];
        } else {
            return 'error: customData not exist in response';
        }
    }

    public function getSignatureDataReturn()
    {
        return $this->signatureDataReturn;
    }

    public function setSignatureDataReturn($signatureDataReturn)
    {
        if (! empty($signatureDataReturn)) {
            $this->signatureDataReturn = $signatureDataReturn;
        } else {
            die('Error: signatureDataReturn cannot be null or empty.');
        }
    }

    public function isDataReturnValid(): bool
    {
        $signatureDataOk = false;
        if ($this->signatureDataReturn === $this->calculateSignature($this->dataReturn, $this->apiKeyInespay)) {
            $signatureDataOk = true;
        }

        return $signatureDataOk;
    }

    public function calculateSignature($dataReturnDecode, $key)
    {
        $signatureBase64 = null;

        if ((! empty($dataReturnDecode))) {
            if ($key != null) {
                $signatureCalculated = $this->createSignatureFromData($dataReturnDecode, $key);
                $signatureBase64 = $this->encodeBase64($signatureCalculated);
            } else {
                die('Error: key to calculated signature not init.');
            }
        } else {
            die('Error: $dataReturnDecode cannot be null or empty.');
        }

        return $signatureBase64;
    }

    private function createSignatureFromData($data, $key): string
    {
        return hash_hmac($this->ALG_HASH, $data, $key, false);
    }

    private function encodeBase64($data): string
    {
        return base64_encode($data);
    }

    public function getCustomRecipient()
    {
        return $this->customRecipient;
    }

    public function setCustomRecipient($customRecipient)
    {
        $this->customRecipient = $customRecipient;
    }

    public function getExecutionRule()
    {
        return $this->executionRule;
    }

    public function setExecutionRule($executionRule)
    {
        $this->executionRule = $executionRule;
    }

    public function getDayOfExecution()
    {
        return $this->dayOfExecution;
    }

    public function setDayOfExecution($dayOfExecution)
    {
        $this->dayOfExecution = $dayOfExecution;
    }

    public function getScheme()
    {
        return $this->scheme;
    }

    public function setScheme($scheme)
    {
        $this->scheme = $scheme;
    }

    private function validateMandatoryParamsPeriodicPayment(): ?string
    {
        $error = null;
        if ($this->subject == null) {
            $error = 'subject not defined';
        } elseif ($this->amount == null) {
            $error = 'amount not defined';
        } elseif ($this->reference == null) {
            $error = 'reference not defined';
        } elseif ($this->frequency == null) {
            $error = 'frequency not defined';
        } elseif ($this->startDate == null) {
            $error = 'startDate not defined';
        }

        return $error;
    }

    private function validateMandatoryParamsSimplePayment(): ?string
    {
        $error = null;
        if ($this->subject == null) {
            $error = 'subject not defined';
        } elseif ($this->amount == null) {
            $error = 'amount not defined';
        } elseif ($this->reference == null) {
            $error = 'reference not defined';
        }

        return $error;
    }

    private function filterToRemoveNullValues($var): bool
    {
        return ($var !== null && $var !== false && $var !== "");
    }

    public function getBanks(BankRequest $bankRequest): BankResponse
    {
		$bankRequestArray = json_decode(json_encode($bankRequest), true);
		$bankRequestWithoutNulls = array_filter((array) $bankRequestArray, [$this, "filterToRemoveNullValues"]); //Eliminamos los valores nulos, vacios..
		$response = parent::apiRequest($bankRequestWithoutNulls, self::BANKS_ENDPOINT, self::GET_HTTP);
        return new BankResponse($response);
    }

    /**
     * @throws \Exception
     */
    public function getSinglePayinsNotification($singlePayinId): SinglePayinNotificationResponse
    {
        $dataParams = [];
		$response = parent::apiRequest($dataParams, self::SINGLE_PAYINS_NOTIFICATIONS_ENDPOINT . '/' . $singlePayinId, self::GET_HTTP);
		return new SinglePayinNotificationResponse($response);
    }

    /**
     * @throws \Exception
     */
    public function getPeriodicPayinsNotification($periodicPayinId): PeriodicPayinNotificationResponse
    {
        $dataParams = [];
		$response = parent::apiRequest($dataParams, self::PERIODIC_PAYINS_NOTIFICATIONS_ENDPOINT . '/' . $periodicPayinId, self::GET_HTTP);
		return new PeriodicPayinNotificationResponse($response);
    }

    /**
     * @throws \Exception
     */
    public function resendSinglePayinsNotification(SinglePayinResendNotificationRequest $singlePayinResendNotificationRequest): SinglePayinResendNotificationResponse
    {
        $singlePayinResendNotificationRequestArray = json_decode(json_encode($singlePayinResendNotificationRequest), true);
        $singlePayinResendNotificationRequestWithoutNulls = array_filter((array) $singlePayinResendNotificationRequestArray, [$this, "filterToRemoveNullValues"]); //Eliminamos los valores nulos, vacios..

        $response = parent::apiRequest($singlePayinResendNotificationRequestWithoutNulls, self::SINGLE_PAYINS_RESEND_NOTIFICATIONS_ENDPOINT);

        return new SinglePayinResendNotificationResponse($response);
    }

    /**
     * @throws \Exception
     */
    public function resendPeriodicPayinsNotification(PeriodicPayinResendNotificationRequest $periodicPayinResendNotificationRequest): PeriodicPayinResendNotificationResponse
    {
        $periodicPayinResendNotificationRequestArray = json_decode(json_encode($periodicPayinResendNotificationRequest), true);
        $periodicPayinResendNotificationRequestWithoutNulls = array_filter((array) $periodicPayinResendNotificationRequestArray, [$this, "filterToRemoveNullValues"]); //Eliminamos los valores nulos, vacios..

        $response = parent::apiRequest($periodicPayinResendNotificationRequestWithoutNulls, self::PERIODIC_PAYINS_RESEND_NOTIFICATIONS_ENDPOINT);

        return new PeriodicPayinResendNotificationResponse($response);
    }

    /**
     * @throws \Exception
     */
    public function getSinglePayinsTransactions($singlePayinId): SinglePayinTransactionsResponse
    {
        $dataParams = [];
		$response = parent::apiRequest($dataParams, self::SINGLE_PAYINS_TRANSACTIONS_ENDPOINT . '/' . $singlePayinId, self::GET_HTTP);
		return new SinglePayinTransactionsResponse($response);
    }

    /**
     * @throws \Exception
     */
    public function getPeriodicPayinsTransactions($periodicPayinId): PeriodicPayinTransactionsResponse
    {
        $dataParams = [];
		$response = parent::apiRequest($dataParams, self::PERIODIC_PAYINS_TRANSACTIONS_ENDPOINT . '/' . $periodicPayinId, self::GET_HTTP);
		return new PeriodicPayinTransactionsResponse($response);
    }

    /**
     * @throws \Exception
     */
    public function getMetricsTotals(MetricsTotalsRequest $metricsTotalsRequest): MetricsTotalsResponse
    {
        $metricsTotalsRequestArray = json_decode(json_encode($metricsTotalsRequest), true);
		$metricsTotalsRequestWithoutNulls = array_filter((array) $metricsTotalsRequestArray, [$this, "filterToRemoveNullValues"]); //Eliminamos los valores nulos, vacios..
		$response = parent::apiRequest($metricsTotalsRequestWithoutNulls, self::SINGLE_PAYINS_METRICS_TOTALS_ENDPOINT, self::GET_HTTP);
        return new MetricsTotalsResponse($response);
    }

    /**
     * @throws \Exception
     */
    public function getMetricsTopBanks(MetricsTopBanksRequest $metricsTopBanksRequest): MetricsTopBanksResponse
    {
        $metricsTopBanksRequestArray = json_decode(json_encode($metricsTopBanksRequest), true);
		$metricsTopBanksRequestWithoutNulls = array_filter((array) $metricsTopBanksRequestArray, [$this, "filterToRemoveNullValues"]); //Eliminamos los valores nulos, vacios..
		$response = parent::apiRequest($metricsTopBanksRequestWithoutNulls, self::SINGLE_PAYINS_METRICS_TOP_BANKS_ENDPOINT, self::GET_HTTP);
        return new MetricsTopBanksResponse($response);
    }
}