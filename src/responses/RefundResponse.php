<?php

namespace inespayPayments\api\payflow\responses;

class RefundResponse extends BaseResponse
{
    private $refundId = null;

    public function __construct($data)
    {
        parent::__construct($data);

        if (isset($data->refundId)) {
            $this->refundId = $data->refundId;
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
}