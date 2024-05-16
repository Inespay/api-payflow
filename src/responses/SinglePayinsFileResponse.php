<?php

namespace inespayPayments\api\payflow\responses;

class SinglePayinsFileResponse extends BaseResponse
{
    private $mimeType = null;

    private $base64Content = null;

    public function __construct($data)
    {
        parent::__construct($data);

        if (isset($data->mimeType)) {
            $this->mimeType = $data->mimeType;
        }

        if (isset($data->base64Content)) {
            $this->base64Content = $data->base64Content;
        }
    }

    /**
     * @return null
     */
    public function getMimeType()
    {
        return $this->mimeType;
    }

    /**
     * @param null $mimeType
     */
    public function setMimeType($mimeType): void
    {
        $this->mimeType = $mimeType;
    }

    /**
     * @return null
     */
    public function getBase64Content()
    {
        return $this->base64Content;
    }

    /**
     * @param null $base64Content
     */
    public function setBase64Content($base64Content): void
    {
        $this->base64Content = $base64Content;
    }
}