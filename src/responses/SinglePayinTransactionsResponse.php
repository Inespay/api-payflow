<?php

namespace inespayPayments\api\payflow\responses;

class SinglePayinTransactionsResponse extends BaseResponse
{
    private $transactions = null;


    public function __construct($data)
    {
        parent::__construct($data);
        
        if (isset($data->transactions)) {
            $this->transactions = $data->transactions;
        }
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