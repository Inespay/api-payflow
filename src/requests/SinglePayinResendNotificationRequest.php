<?php

namespace inespayPayments\api\payflow\requests;

class SinglePayinResendNotificationRequest implements \JsonSerializable
{
    private $singlePayinId;

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    /**
     * @return mixed
     */
    public function getSinglePayinId()
    {
        return $this->singlePayinId;
    }

    /**
     * @param mixed $singlePayinId
     */
    public function setSinglePayinId($singlePayinId): void
    {
        $this->singlePayinId = $singlePayinId;
    }
}