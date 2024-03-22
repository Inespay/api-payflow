<?php

namespace Inespay\api\payflow;
use Exception;

class InespayApiBase
{
    const STATUS_CODE_SUCCESS = 200;

    const ENV_TEST = 'test';
    const ENV_SAN = 'san';
    const ENV_UAT = 'uat';
    const ENV_PRO = 'pro';

    const GET_METHOD = 'GET';
    const POST_METHOD = 'POST';

    private $URL_TEST = "https://apiflow.inespay.com/test";
    private $URL_SANDBOX = "https://apiflow.inespay.com/san";
    private $URL_UAT = "https://apiflow.inespay.com/uat";
    private $URL_PRODUCTION = "https://apiflow.inespay.com/pro";

    protected $urlBaseApiInespay = null;
    protected $tokenInespay = null;
    protected $apiKeyInespay = null;

    public function setEnvironmentInespay($environmentApi)
    {
        if ($environmentApi == InespayApiBase::ENV_TEST) {
            $this->urlBaseApiInespay = $this->URL_TEST;
        } else if ($environmentApi == InespayApiBase::ENV_SAN) {
            $this->urlBaseApiInespay = $this->URL_SANDBOX;
        } else if ($environmentApi == InespayApiBase::ENV_UAT) {
            $this->urlBaseApiInespay = $this->URL_UAT;
        } else if ($environmentApi == InespayApiBase::ENV_PRO) {
            $this->urlBaseApiInespay = $this->URL_PRODUCTION;
        }
    }

    public function setTokenInespay($tokenApi)
    {
        $this->tokenInespay = $tokenApi;
    }

    public function setApiKeyInespay($keyApi)
    {
        $this->apiKeyInespay = $keyApi;
    }

    protected function apiRequest($data, $method)
    {
        $headers = [];
        $headers[] = 'Authorization:' . $this->tokenInespay;
        $headers[] = 'X-Api-Key:' . $this->apiKeyInespay;
        $headers[] = 'Content-Type: application/json';

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $this->urlBaseApiInespay . $method);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_ENCODING, 'UTF-8');
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 20);
        curl_setopt($curl, CURLOPT_TIMEOUT, 25);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));

        $result = curl_exec($curl);

        if (!curl_errno($curl)) {
            curl_close($curl);
            $result = json_decode($result);
        } else {
            throw new \Exception(curl_error($curl));
        }

        return $result;
    }
}