<?php

namespace inespayPayments\api\payflow\responses;

class MetricsTotalsResponse
{
    private $status = null;

    private $statusDesc = null;

    private $numOfPayments = null;
    private $numOfPaymentsOk = null;
    private $paymentVolume = null;
    private $paymentVolumeOk = null;


    public function __construct($data)
    {
        if (isset($data->status)) {
            $this->status = $data->status;
        }
        
        if (isset($data->statusDesc)) {
            $this->statusDesc = $data->statusDesc;
        }
        
        if (isset($data->numOfPayments)) {
            $this->numOfPayments = $data->numOfPayments;
        }
        if (isset($data->numOfPaymentsOk)) {
            $this->numOfPaymentsOk = $data->numOfPaymentsOk;
        }
        if (isset($data->paymentVolume)) {
            $this->paymentVolume = $data->paymentVolume;
        }
        if (isset($data->paymentVolumeOk)) {
            $this->paymentVolumeOk = $data->paymentVolumeOk;
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
    public function getNumOfPayments()
    {
        return $this->numOfPayments;
    }

    /**
     * @param null $numOfPayments
     */
    public function setNumOfPayments($numOfPayments): void
    {
        $this->numOfPayments = $numOfPayments;
    }
    /**
     * @return null
     */
    public function getNumOfPaymentsOk()
    {
        return $this->numOfPaymentsOk;
    }

    /**
     * @param null $numOfPaymentsOk
     */
    public function setNumOfPaymentsOk($numOfPaymentsOk): void
    {
        $this->numOfPaymentsOk = $numOfPaymentsOk;
    }
    /**
     * @return null
     */
    public function getPaymentVolume()
    {
        return $this->paymentVolume;
    }

    /**
     * @param null $paymentVolume
     */
    public function setPaymentVolume($paymentVolume): void
    {
        $this->paymentVolume = $paymentVolume;
    }
    /**
     * @return null
     */
    public function getPaymentVolumeOk()
    {
        return $this->paymentVolumeOk;
    }

    /**
     * @param null $paymentVolumeOk
     */
    public function setPaymentVolumeOk($paymentVolumeOk): void
    {
        $this->paymentVolumeOk = $paymentVolumeOk;
    }
}