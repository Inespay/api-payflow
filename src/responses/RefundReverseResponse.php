<?php

namespace inespayPayments\api\payflow\responses;

class RefundReverseResponse extends BaseResponse
{
    private $refundId = null;
    private $refundLink = null;

    public function __construct($data)
    {
        parent::__construct($data);

        if (isset($data->refundId)) {
            $this->refundId = $data->refundId;
        }
        if (isset($data->refundLink)) {
            $this->refundLink = $data->refundLink;
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
    public function getRefundLink()
    {
        return $this->refundLink;
    }

    /**
     * @param null $refundLink
     */
    public function setRefundLink($refundLink): void
    {
        $this->refundLink = $refundLink;
    }
}