<?php

namespace inespayPayments\api\payflow\responses;

class SinglePayinTransactionsResponse
{
    private $status = null;

    private $statusDesc = null;

    private $transactions = null;


    public function __construct($data)
    {
        if (isset($data->status)) {
            $this->status = $data->status;
        }
        
        if (isset($data->statusDesc)) {
            $this->statusDesc = $data->statusDesc;
        }
        
        if (isset($data->transactions)) {
            $this->transactions = $data->transactions;
        }
    }

    /**
     * @return null
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param null $status
     */
    public function setStatus($status): void
    {
        $this->status = $status;
    }

    /**
     * @return null
     */
    public function getStatusDesc()
    {
        return $this->statusDesc;
    }

    /**
     * @param null $statusDesc
     */
    public function setStatusDesc($statusDesc): void
    {
        $this->statusDesc = $statusDesc;
    }

    /**
     * @return null
     */
    public function getTransactions()
    {
        return $this->transactions;
    }

    /**
     * @param null $transactions
     */
    public function setTransactions($transactions): void
    {
        $this->transactions = $transactions;
    }
}