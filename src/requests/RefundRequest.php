<?php

namespace inespayPayments\api\payflow\requests;

class RefundRequest implements \JsonSerializable
{
    private $singlePayinId;

    private $description;

    private $reference;

    private $amount;

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
}