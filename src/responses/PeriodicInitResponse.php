<?php

namespace inespayPayments\api\payflow\responses;

class PeriodicInitResponse extends BaseResponse 
{
    private $periodicPayinId = null;

    private $periodicPayinLink = null;

    public function __construct($data)
    {
        parent::__construct($data);

        if (isset($data->periodicPayinId)) {
            $this->periodicPayinId = $data->periodicPayinId;
        }

        if (isset($data->periodicPayinLink)) {
            $this->periodicPayinLink = $data->periodicPayinLink;
        }
    }

    public function getPeriodicPayinId()
    {
        return $this->periodicPayinId;
    }

    public function getPeriodicPayinLink()
    {
        return $this->periodicPayinLink;
    }
}