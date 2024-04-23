<?php

namespace inespayPayments\api\payflow\responses;

use inespayPayments\api\payflow\InespayApiBase;

class BaseResponse
{
    protected $status = null;

    protected $statusDesc = null;

    public function __construct($data)
    {
        $this->status = InespayApiBase::STATUS_CODE_ERROR;
        $this->statusDesc = InespayApiBase::STATUS_CODE_ERROR_DESC;
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