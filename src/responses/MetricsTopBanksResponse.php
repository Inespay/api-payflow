<?php

namespace inespayPayments\api\payflow\responses;

class MetricsTopBanksResponse extends BaseResponse
{
    private $metrics = null;


    public function __construct($data)
    {
        parent::__construct($data);
        
        if (isset($data->metrics)) {
            $this->metrics = $data->metrics;
        }
    }
    /**
     * @return null
     */
    public function getMetrics()
    {
        return $this->metrics;
    }

    /**
     * @param null $metrics
     */
    public function setMetrics($metrics): void
    {
        $this->metrics = $metrics;
    }
    
}