<?php

namespace inespayPayments\api\payflow\requests;

class RefundRequest implements \JsonSerializable
{
    private $singlePayinId;

    private $amount;

    private $description;

    private $reference;

    private $okNotifUrl;
    private $okNotifUrlContentType;
    private $errorNotifUrl;
    private $errorNotifUrlContentType;


    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    /**
     * @return mixed
     */
    public function getSinglePayinId()
    {
        return $this->singlePayinId;
    }

    /**
     * @param mixed $singlePayinId
     */
    public function setSinglePayinId($singlePayinId): void
    {
        $this->singlePayinId = $singlePayinId;
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
    public function getOkNotifUrl()
    {
        return $this->okNotifUrl;
    }

    /**
     * @param mixed $okNotifUrl
     */
    public function setOkNotifUrl($okNotifUrl): void
    {
        $this->okNotifUrl = $okNotifUrl;
    }
    /**
     * @return mixed
     */
    public function getOkNotifUrlContentType()
    {
        return $this->okNotifUrlContentType;
    }

    /**
     * @param mixed $okNotifUrlContentType
     */
    public function setOkNotifUrlContentType($okNotifUrlContentType): void
    {
        $this->okNotifUrlContentType = $okNotifUrlContentType;
    }
    /**
     * @return mixed
     */
    public function getErrorNotifUrl()
    {
        return $this->errorNotifUrl;
    }

    /**
     * @param mixed $errorNotifUrl
     */
    public function setErrorNotifUrl($errorNotifUrl): void
    {
        $this->errorNotifUrl = $errorNotifUrl;
    }
    /**
     * @return mixed
     */
    public function getErrorNotifUrlContentType()
    {
        return $this->errorNotifUrlContentType;
    }

    /**
     * @param mixed $errorNotifUrlContentType
     */
    public function setErrorNotifUrlContentType($errorNotifUrlContentType): void
    {
        $this->errorNotifUrlContentType = $errorNotifUrlContentType;
    }
}