<?php

namespace inespayPayments\api\payflow\responses;

class SingleInitResponse extends BaseResponse
{
    private $singlePayinId = null;

    private $singlePayinLink = null;

    public function __construct($data)
    {
        parent::__construct($data);

        if (isset($data->singlePayinId)) {
            $this->singlePayinId = $data->singlePayinId;
        }

        if (isset($data->singlePayinLink)) {
            $this->singlePayinLink = $data->singlePayinLink;
        }
    }

    public function getSinglePayinId()
    {
        return $this->singlePayinId;
    }

    public function getSinglePayinLink()
    {
        return $this->singlePayinLink;
    }
}