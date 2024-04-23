<?php

namespace inespayPayments\api\payflow\responses;

class PeriodicCancelResponse extends BaseResponse
{
    private $periodicCancelId = null;

    private $periodicCancelLink = null;

    public function __construct($data)
    {
        parent::__construct($data);

        if (isset($data->periodicCancelId)) {
            $this->periodicCancelId = $data->periodicCancelId;
        }

        if (isset($data->periodicCancelLink)) {
            $this->periodicCancelLink = $data->periodicCancelLink;
        }
    }

    /**
     * @return null
     */
    public function getPeriodicCancelId()
    {
        return $this->periodicCancelId;
    }

    /**
     * @param null $periodicCancelId
     */
    public function setPeriodicCancelId($periodicCancelId): void
    {
        $this->periodicCancelId = $periodicCancelId;
    }

    /**
     * @return null
     */
    public function getPeriodicCancelLink()
    {
        return $this->periodicCancelLink;
    }

    /**
     * @param null $periodicCancelLink
     */
    public function setPeriodicCancelLink($periodicCancelLink): void
    {
        $this->periodicCancelLink = $periodicCancelLink;
    }
}