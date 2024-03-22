<?php

namespace Inespay\api\payflow;

class InespayApiPublic extends InespayApiBase
{
    private $ALG_HASH = 'sha256';

    const SIMPLE_PAYMENT_URL = '/url/signer';
    const PERIODIC_PAYMENT_URL = '/url/periodic-payment-signer';
    const CANCEL_PERIODIC_PAYMENT_URL = '/url/cancel-periodic-payment-signer';

    private $subject = null;
    private $amount = null;
    private $reference = null;
    private $urlOk = null;
    private $urlOkMethod = null;
    private $urlError = null;
    private $urlErrorMethod = null;
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
    private $transactionId = null;

    private $dataReturn = null;
    private $dataReturnDecode = null;
    private $dataReturnJson = null;
    private $signatureDataReturn = null;
    private $customRecipient = null;

    public function wakeup()
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

    private function validateMandatoryParamsSimplePayment()
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

    public function generateSimplePaymentUrl()
    {
        $dataParams = [];

        $error = $this->validateMandatoryParamsSimplePayment();
        if ($error == null) {

            $dataParams['subject'] = $this->subject;
            $dataParams['amount'] = $this->amount;
            $dataParams['reference'] = $this->reference;

            //optional params
            if ($this->urlOk != null) {
                $dataParams['urlOk'] = $this->urlOk;
            }

            if ($this->urlOkMethod != null) {
                $dataParams['urlOkMethod'] = $this->urlOkMethod;
            }

            if ($this->urlError != null) {
                $dataParams['urlError'] = $this->urlError;
            }

            if ($this->urlErrorMethod != null) {
                $dataParams['urlErrorMethod'] = $this->urlErrorMethod;
            }

            if ($this->urlNotif != null) {
                $dataParams['urlNotif'] = $this->urlNotif;
            }

            if ($this->expireMinutes != null) {
                $dataParams['expireMinutes'] = $this->expireMinutes;
            }

            if ($this->customData != null) {
                $dataParams['customData'] = $this->customData;
            }

            if ($this->partnerId != null) {
                $dataParams['partnerId'] = $this->partnerId;
            }

            if ($this->bankIdSelected != null) {
                $dataParams['bankIdSelected'] = $this->bankIdSelected;
            }

            if ($this->holderDestiny != null) {
                $dataParams['holderDestiny'] = $this->holderDestiny;
            }

            if ($this->accountDestiny != null) {
                $dataParams['accountDestiny'] = $this->accountDestiny;
            }

            if ($this->customRecipient != null) {
                $dataParams['customRecipient'] = $this->customRecipient;
            }

            $result = parent::apiRequest($dataParams, self::SIMPLE_PAYMENT_URL);
            $response = new InespayResponse($result);
            return $response;
        } else {
            die('Error:' . $error);
        }
    }

    private function validateMandatoryParamsPeriodicPayment()
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
        } elseif ($this->debtorAccount == null) {
            $error = 'debtorAccount not defined';
        } elseif ($this->startDate == null) {
            $error = 'startDate not defined';
        }

        return $error;
    }

    public function generatePeriodicPaymentUrl()
    {
        $dataParams = [];

        $error = $this->validateMandatoryParamsPeriodicPayment();
        if ($error == null) {

            $dataParams['subject'] = $this->subject;
            $dataParams['amount'] = $this->amount;
            $dataParams['reference'] = $this->reference;
            $dataParams['frequency'] = $this->frequency;
            $dataParams['debtorAccount'] = $this->debtorAccount;
            $dataParams['startDate'] = $this->startDate;

            //optional params
            if ($this->urlOk != null) {
                $dataParams['urlOk'] = $this->urlOk;
            }

            if ($this->urlError != null) {
                $dataParams['urlError'] = $this->urlError;
            }

            if ($this->urlNotif != null) {
                $dataParams['urlNotif'] = $this->urlNotif;
            }

            if ($this->expireMinutes != null) {
                $dataParams['expireMinutes'] = $this->expireMinutes;
            }

            if ($this->customData != null) {
                $dataParams['customData'] = $this->customData;
            }

            if ($this->partnerId != null) {
                $dataParams['partnerId'] = $this->partnerId;
            }

            if ($this->holderDestiny != null) {
                $dataParams['holderDestiny'] = $this->holderDestiny;
            }

            if ($this->accountDestiny != null) {
                $dataParams['accountDestiny'] = $this->accountDestiny;
            }

            if ($this->customRecipient != null) {
                $dataParams['customRecipient'] = $this->customRecipient;
            }

            if ($this->endDate != null) {
                $dataParams['endDate'] = $this->endDate;
            }

            $result = parent::apiRequest($dataParams, self::PERIODIC_PAYMENT_URL);
            $response = new InespayResponse($result);
            return $response;
        } else {
            die('Error:' . $error);
        }
    }

    private function validateMandatoryParamsCancelPeriodicPayment()
    {
        $error = null;
        if ($this->transactionId == null) {
            $error = 'transactionId not defined';
        } elseif ($this->reference == null) {
            $error = 'reference not defined';
        }

        return $error;
    }

    public function generateCancelPeriodicPaymentUrl()
    {
        $dataParams = [];

        $error = $this->validateMandatoryParamsCancelPeriodicPayment();
        if ($error == null) {

            $dataParams['transactionId'] = $this->transactionId;
            $dataParams['reference'] = $this->reference;

            //optional params
            if ($this->urlOk != null) {
                $dataParams['urlOk'] = $this->urlOk;
            }

            if ($this->urlError != null) {
                $dataParams['urlError'] = $this->urlError;
            }

            if ($this->urlNotif != null) {
                $dataParams['urlNotif'] = $this->urlNotif;
            }

            if ($this->expireMinutes != null) {
                $dataParams['expireMinutes'] = $this->expireMinutes;
            }

            if ($this->customData != null) {
                $dataParams['customData'] = $this->customData;
            }

            if ($this->partnerId != null) {
                $dataParams['partnerId'] = $this->partnerId;
            }

            $result = parent::apiRequest($dataParams, self::CANCEL_PERIODIC_PAYMENT_URL);
            $response = new InespayResponse($result);
            return $response;
        } else {
            die('Error:' . $error);
        }
    }

    public function calculateSignature($dataReturnDecode, $key)
    {
        $signatureBase64 = null;

        if (($dataReturnDecode != null) && (!empty($dataReturnDecode))) {
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

    private function createSignatureFromData($data, $key)
    {
        $signatureData = hash_hmac($this->ALG_HASH, $data, $key, false);

        return $signatureData;
    }

    private function encodeBase64($data)
    {
        return base64_encode($data);
    }

    private function decodeBase64($data)
    {
        return base64_decode($data);
    }

    public function setSubject($subject)
    {
        if ($subject != null) {
            if (!empty($subject)) {
                $this->subject = trim($subject);
            } else {
                die('Error: subject cannot be empty.');
            }
        } else {
            die('Error: subject cannot be null.');
        }
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

    public function getAmount()
    {
        return ($this->amount / 100);
    }

    public function setReference($reference)
    {
        if ($reference != null) {
            if (!empty($reference)) {
                $this->reference = trim($reference);
            } else {
                die('Error: reference cannot be empty.');
            }
        } else {
            die('Error: reference cannot be null.');
        }
    }

    public function getReference()
    {
        return $this->reference;
    }

    public function setUrlOk($urlOk)
    {
        if ($urlOk != null) {
            if (!empty($urlOk)) {
                $this->urlOk = trim($urlOk);
            } else {
                die('Error: urlOk cannot be empty.');
            }
        } else {
            die('Error: urlOk cannot be null.');
        }
    }

    public function setUrlOkMethod($urlOkMethod)
    {
        if ($urlOkMethod != null) {
            if (!empty($urlOkMethod)) {
                $this->urlOkMethod = trim($urlOkMethod);
            } else {
                die('Error: urlOkMethod cannot be empty.');
            }
        } else {
            die('Error: urlOkMethod cannot be null.');
        }
    }

    public function setUrlError($urlError)
    {
        if ($urlError != null) {
            if (!empty($urlError)) {
                $this->urlError = trim($urlError);
            } else {
                die('Error: urlError cannot be empty.');
            }
        } else {
            die('Error: urlError cannot be null.');
        }
    }

    public function setUrlErrorMethod($urlErrorMethod)
    {
        if ($urlErrorMethod != null) {
            if (!empty($urlErrorMethod)) {
                $this->urlErrorMethod = trim($urlErrorMethod);
            } else {
                die('Error: urlErrorMethod cannot be empty.');
            }
        } else {
            die('Error: urlErrorMethod cannot be null.');
        }
    }

    public function setUrlNotif($urlNotif)
    {
        if ($urlNotif != null) {
            if (!empty($urlNotif)) {
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
            if (!empty($accountDestiny)) {
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
            if (!empty($holderDestiny)) {
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
            if (!empty($customData)) {
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
            if (!empty($partnerId)) {
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
            if (!empty($frequency)) {
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
            if (!empty($debtorAccount)) {
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
            if (!empty($startDate)) {
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
            if (!empty($endDate)) {
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
            if (!empty($bankIdSelected)) {
                $this->bankIdSelected = trim($bankIdSelected);
            } else {
                die('Error: bankIdSelected cannot be empty.');
            }
        } else {
            die('Error: bankIdSelected cannot be null.');
        }
    }

    public function setTransactionId($transactionId)
    {
        if ($transactionId != null) {
            if (!empty($transactionId)) {
                $this->transactionId = trim($transactionId);
            } else {
                die('Error: transactionId cannot be empty.');
            }
        } else {
            die('Error: transactionId cannot be null.');
        }
    }

    public function setDataReturn($dataReturnBase64)
    {
        if (($dataReturnBase64 != null) && (!empty($dataReturnBase64))) {
            $this->dataReturn = $dataReturnBase64;
            $this->dataReturnDecode = $this->decodeBase64($this->dataReturn);

            $this->dataReturnJson = json_decode($this->dataReturnDecode, true);
        } else {
            die('Error: dataReturn cannot be null or empty.');
        }
    }

    public function getStatusFromDataReturn()
    {
        return $this->dataReturnJson['status'];
    }

    public function getDescriptionFromDataReturn()
    {
        return $this->dataReturnJson['description'];
    }

    public function getTransactionIdFromDataReturn()
    {
        return $this->dataReturnJson['transactionId'];
    }

    public function getAmountFromDataReturn()
    {
        return $this->dataReturnJson['amount'];
    }

    public function getReferenceFromDataReturn()
    {
        return $this->dataReturnJson['reference'];
    }

    public function getCustomDataFromDataReturn()
    {
        if (array_key_exists ('customData', $this->dataReturnJson)){
            return $this->dataReturnJson['customData'];
        }else{
            return 'error: customData not exist in response';
        }
    }

    public function setSignatureDataReturn($signatureDataReturn)
    {
        if (($signatureDataReturn != null) && !empty($signatureDataReturn)) {
            $this->signatureDataReturn = $signatureDataReturn;
        } else {
            die('Error: signatureDataReturn cannot be null or empty.');
        }
    }

    public function getSignatureDataReturn()
    {
        return $this->signatureDataReturn;
    }

    public function isDataReturnValid()
    {
        $signatureDataOk = false;
        if ($this->signatureDataReturn === $this->calculateSignature($this->dataReturn, $this->apiKeyInespay)) {
            $signatureDataOk = true;
        }

        return $signatureDataOk;
    }

    public function setCustomRecipient($customRecipient)
    {
        $this->customRecipient = $customRecipient;
    }

    public function getCustomRecipient()
    {
        return $this->customRecipient;
    }
}