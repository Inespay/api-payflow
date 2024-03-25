<?php

namespace Inespay\api\payflow;

class InespayResponse
{
    private $urlSigned = null;

    private $statusCode = null;

    private $idDebt = null;

    private $statusDescription = null;

    public function __construct($data)
    {
        if (isset($data->status)) {
            $this->statusCode = $data->status;
        }

        if (isset($data->description)) {
            $this->statusDescription = $data->description;
        }

        if (isset($data->url)) {
            $this->urlSigned = $data->url;
        }

        if (isset($data->idDebt)) {
            $this->idDebt = $data->idDebt;
        }
    }

    public function getUrlSigned()
    {
        return $this->urlSigned;
    }

    public function getStatusCode()
    {
        return $this->statusCode;
    }

    public function getStatusDescription()
    {
        return $this->statusDescription;
    }

    public function getIdDebt()
    {
        return $this->idDebt;
    }
}