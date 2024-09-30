<?php

namespace inespayPayments\api\payflow\requests;

class SinglePayinRequest implements \JsonSerializable
{
    private $dateFrom;
    private $dateTo;
    private $pageSize;
    private $pageRequest;
    private $order;
    private $orderByField;
    private $amount;
    private $description;
    private $reference;
    private $singlePayinId;
    private $codStatus;
    private $debtorBankId;
    private $creditorBankId;

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    /**
     * @return mixed
     */
    public function getDateFrom()
    {
        return $this->dateFrom;
    }

    /**
     * @param mixed $dateFrom
     */
    public function setDateFrom($dateFrom): void
    {
        $this->dateFrom = $dateFrom;
    }
    /**
     * @return mixed
     */
    public function getDateTo()
    {
        return $this->dateTo;
    }

    /**
     * @param mixed $dateTo
     */
    public function setDateTo($dateTo): void
    {
        $this->dateTo = $dateTo;
    }
    /**
     * @return mixed
     */
    public function getPageSize()
    {
        return $this->pageSize;
    }

    /**
     * @param mixed $pageSize
     */
    public function setPageSize($pageSize): void
    {
        $this->pageSize = $pageSize;
    }
    /**
     * @return mixed
     */
    public function getPageRequest()
    {
        return $this->pageRequest;
    }

    /**
     * @param mixed $pageRequest
     */
    public function setPageRequest($pageRequest): void
    {
        $this->pageRequest = $pageRequest;
    }
    /**
     * @return mixed
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param mixed $order
     */
    public function setOrder($order): void
    {
        $this->order = $order;
    }
    /**
     * @return mixed
     */
    public function getOrderByField()
    {
        return $this->orderByField;
    }

    /**
     * @param mixed $orderByField
     */
    public function setOrderByField($orderByField): void
    {
        $this->orderByField = $orderByField;
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
    public function getCodStatus()
    {
        return $this->codStatus;
    }

    /**
     * @param mixed $codStatus
     */
    public function setCodStatus($codStatus): void
    {
        $this->codStatus = $codStatus;
    }

    /**
     * @return mixed
     */
    public function getDebtorBankId()
    {
        return $this->debtorBankId;
    }

    /**
     * @param mixed $debtorBankId
     */
    public function setDebtorBankId($debtorBankId): void
    {
        $this->debtorBankId = $debtorBankId;
    }

    /**
     * @return mixed
     */
    public function getCreditorBankId()
    {
        return $this->creditorBankId;
    }

    /**
     * @param mixed $creditorBankId
     */
    public function setCreditorBankId($creditorBankId): void
    {
        $this->creditorBankId = $creditorBankId;
    }
}