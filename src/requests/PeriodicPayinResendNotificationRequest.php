<?php

namespace inespayPayments\api\payflow\requests;

class PeriodicPayinResendNotificationRequest implements \JsonSerializable
{
    private $periodicPayinId;

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    /**
     * @return mixed
     */
    public function getPeriodicPayinId()
    {
        return $this->periodicPayinId;
    }

    /**
     * @param mixed $periodicPayinId
     */
    public function setPeriodicPayinId($periodicPayinId): void
    {
        $this->periodicPayinId = $periodicPayinId;
    }
}