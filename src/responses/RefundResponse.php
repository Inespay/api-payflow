<?php

namespace inespayPayments\api\payflow\responses;

class RefundResponse
{
    private $refundId = null;

    private $status = null;

    private $statusDesc = null;

    public function __construct($data)
    {
        if (isset($data->refundId)) {
            $this->refundId = $data->refundId;
        }

        if (isset($data->status)) {
            $this->status = $data->status;
        }

        if (isset($data->statusDesc)) {
            $this->statusDesc = $data->statusDesc;
        }
    }

    /**
     * @return null
     */
    public function getRefundId()
    {
        return $this->refundId;
    }

    /**
     * @param null $refundId
     */
    public function setRefundId($refundId): void
    {
        $this->refundId = $refundId;
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
}