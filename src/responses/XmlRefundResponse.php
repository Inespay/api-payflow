<?php

namespace inespayPayments\api\payflow\responses;

class XmlRefundResponse extends BaseResponse
{
    private $xml = null;

    public function __construct($data)
    {
        parent::__construct($data);

        if (isset($data->xml)) {
            $this->xml = $data->xml;
        }
    }

    /**
     * @return null
     */
    public function getXml()
    {
        return $this->xml;
    }

    /**
     * @param null $xml
     */
    public function setXml($xml): void
    {
        $this->xml = $xml;
    }
}