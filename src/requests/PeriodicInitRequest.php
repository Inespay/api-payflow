<?php

namespace inespayPayments\api\payflow\requests;

class PeriodicInitRequest implements \JsonSerializable
{
    private $description;

    private $amount;

    private $reference;

    private $frequency;

    private $debtorAccount;

    private $startDate;

    private $endDate;

    private $successLinkRedirect;

    private $successLinkRedirectMethod;

    private $abortLinkRedirect;

    private $abortLinkRedirectMethod;

    private $notifUrl;

    private $notifUrlContentType;

    private $customData;

    private $expiration;

    private $creditorAccount;

    private $customRecipient;

    private $scheme;

    private $selectedBank;

    private $executionRule;

    private $dayOfExecution;

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @param mixed $reference
     */
    public function setReference($reference): void
    {
        $this->reference = $reference;
    }

    /**
     * @return mixed
     */
    public function getFrequency()
    {
        return $this->frequency;
    }

    /**
     * @param mixed $frequency
     */
    public function setFrequency($frequency): void
    {
        $this->frequency = $frequency;
    }

    /**
     * @return mixed
     */
    public function getDebtorAccount()
    {
        return $this->debtorAccount;
    }

    /**
     * @param mixed $debtorAccount
     */
    public function setDebtorAccount($debtorAccount): void
    {
        $this->debtorAccount = $debtorAccount;
    }

    /**
     * @return mixed
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param mixed $startDate
     */
    public function setStartDate($startDate): void
    {
        $this->startDate = $startDate;
    }

    /**
     * @return mixed
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param mixed $endDate
     */
    public function setEndDate($endDate): void
    {
        $this->endDate = $endDate;
    }

    /**
     * @return mixed
     */
    public function getSuccessLinkRedirect()
    {
        return $this->successLinkRedirect;
    }

    /**
     * @param mixed $successLinkRedirect
     */
    public function setSuccessLinkRedirect($successLinkRedirect): void
    {
        $this->successLinkRedirect = $successLinkRedirect;
    }

    /**
     * @return mixed
     */
    public function getSuccessLinkRedirectMethod()
    {
        return $this->successLinkRedirectMethod;
    }

    /**
     * @param mixed $successLinkRedirectMethod
     */
    public function setSuccessLinkRedirectMethod($successLinkRedirectMethod): void
    {
        $this->successLinkRedirectMethod = $successLinkRedirectMethod;
    }

    /**
     * @return mixed
     */
    public function getAbortLinkRedirect()
    {
        return $this->abortLinkRedirect;
    }

    /**
     * @param mixed $abortLinkRedirect
     */
    public function setAbortLinkRedirect($abortLinkRedirect): void
    {
        $this->abortLinkRedirect = $abortLinkRedirect;
    }

    /**
     * @return mixed
     */
    public function getAbortLinkRedirectMethod()
    {
        return $this->abortLinkRedirectMethod;
    }

    /**
     * @param mixed $abortLinkRedirectMethod
     */
    public function setAbortLinkRedirectMethod($abortLinkRedirectMethod): void
    {
        $this->abortLinkRedirectMethod = $abortLinkRedirectMethod;
    }

    /**
     * @return mixed
     */
    public function getNotifUrl()
    {
        return $this->notifUrl;
    }

    /**
     * @param mixed $notifUrl
     */
    public function setNotifUrl($notifUrl): void
    {
        $this->notifUrl = $notifUrl;
    }

    /**
     * @return mixed
     */
    public function getNotifUrlContentType()
    {
        return $this->notifUrlContentType;
    }

    /**
     * @param mixed $notifUrlContentType
     */
    public function setNotifUrlContentType($notifUrlContentType): void
    {
        $this->notifUrlContentType = $notifUrlContentType;
    }

    /**
     * @return mixed
     */
    public function getCustomData()
    {
        return $this->customData;
    }

    /**
     * @param mixed $customData
     */
    public function setCustomData($customData): void
    {
        $this->customData = $customData;
    }

    /**
     * @return mixed
     */
    public function getExpiration()
    {
        return $this->expiration;
    }

    /**
     * @param mixed $expiration
     */
    public function setExpiration($expiration): void
    {
        $this->expiration = $expiration;
    }

    /**
     * @return mixed
     */
    public function getCreditorAccount()
    {
        return $this->creditorAccount;
    }

    /**
     * @param mixed $creditorAccount
     */
    public function setCreditorAccount($creditorAccount): void
    {
        $this->creditorAccount = $creditorAccount;
    }

    /**
     * @return mixed
     */
    public function getCustomRecipient()
    {
        return $this->customRecipient;
    }

    /**
     * @param mixed $customRecipient
     */
    public function setCustomRecipient($customRecipient): void
    {
        $this->customRecipient = $customRecipient;
    }

    /**
     * @return mixed
     */
    public function getScheme()
    {
        return $this->scheme;
    }

    /**
     * @param mixed $scheme
     */
    public function setScheme($scheme): void
    {
        $this->scheme = $scheme;
    }

    /**
     * @return mixed
     */
    public function getSelectedBank()
    {
        return $this->selectedBank;
    }

    /**
     * @param mixed $selectedBank
     */
    public function setSelectedBank($selectedBank): void
    {
        $this->selectedBank = $selectedBank;
    }

    /**
     * @return mixed
     */
    public function getExecutionRule()
    {
        return $this->executionRule;
    }

    /**
     * @param mixed $executionRule
     */
    public function setExecutionRule($executionRule): void
    {
        $this->executionRule = $executionRule;
    }

    /**
     * @return mixed
     */
    public function getDayOfExecution()
    {
        return $this->dayOfExecution;
    }

    /**
     * @param mixed $dayOfExecution
     */
    public function setDayOfExecution($dayOfExecution): void
    {
        $this->dayOfExecution = $dayOfExecution;
    }
}