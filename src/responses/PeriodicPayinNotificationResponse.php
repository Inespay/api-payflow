<?php

namespace inespayPayments\api\payflow\responses;

class PeriodicPayinNotificationResponse extends BaseResponse
{
    private $notifications = null;


    public function __construct($data)
    {
        parent::__construct($data);
        
        if (isset($data->notifications)) {
            $this->notifications = $data->notifications;
        }
    }

    /**
     * @return null
     */
    public function getNotifications()
    {
        return $this->notifications;
    }

    /**
     * @param null $notifications
     */
    public function setNotifications($notifications): void
    {
        $this->notifications = $notifications;
    }
}