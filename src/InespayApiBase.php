<?php

namespace inespayPayments\api\payflow;
use Exception;

class InespayApiBase
{
    public const STATUS_CODE_OK = 'OK';
    public const STATUS_CODE_SETTLED = 'SETTLED';
    public const STATUS_CODE_SUCCESS = '200';
    public const STATUS_CODE_ERROR = '300';
    public const STATUS_CODE_ERROR_REQUEST = 'E300';
    public const STATUS_CODE_INVALID_PARAMS = 'E301';
    public const STATUS_CODE_INVALID_CREDENTIALS_COLLECTING = 'R300';
    public const STATUS_CODE_PAYMENT_ORDER_ID_NOT_EXISTS = 'R301';
    public const STATUS_CODE_REFUND_AMOUNT_GREATER_THAN_ORIGINAL_AMOUNT = 'R302';
    public const STATUS_CODE_PAYMENT_ORDER_ID_NOT_EXECUTED = 'R303';
    public const STATUS_CODE_PAYMENT_ORDER_ID_IS_RETURN = 'R304';
    public const STATUS_CODE_REFUND_TOTAL_AMOUNT_GREATER_THAN_ORIGINAL_AMOUNT = 'R305';
    public const STATUS_CODE_INSUFFICIENT_BALANCE = 'R306';
    public const STATUS_CODE_REFUND_PENDING_ALREADY_EXIST = 'R307';

    public const STATUS_CODE_ERROR_DESC = 'Default error';

    public const CONNECT_TIMEOUT = 28;

    public const TIMEOUT = 28;

    public const ENV_TEST = 'test';

    public const ENV_SAN = 'san';

    public const ENV_UAT = 'uat';

    public const ENV_PRO = 'pro';

    protected $urlBaseApiInespay = null;

    protected $tokenInespay = null;

    protected $apiKeyInespay = null;

    private const URL_BASE = 'https://apiflow.inespay.com';

    private const URL_TEST = self::URL_BASE . '/test/v21';

    private const URL_SANDBOX = self::URL_BASE . '/san/v21';

    private const URL_UAT = self::URL_BASE . '/uat/v21';

    private const URL_PRODUCTION = self::URL_BASE . '/pro/v21';

    public const GET_HTTP = 'get';

    public const POST_HTTP = 'post';

    public function setEnvironmentInespay($environmentApi)
    {
        $this->urlBaseApiInespay = $this->getUrlBaseWithEnv($environmentApi);
    }

    public function setTokenInespay($tokenApi)
    {
        $this->tokenInespay = $tokenApi;
    }

    public function setApiKeyInespay($keyApi)
    {
        $this->apiKeyInespay = $keyApi;
    }

    /**
     * @throws Exception
     */
    protected function apiRequest($data, string $endpoint, string $httpVerb = self::POST_HTTP)
    {
        $headers = [];
        $headers[] = 'Authorization:' . $this->tokenInespay;
        $headers[] = 'X-Api-Key:' . $this->apiKeyInespay;
        $headers[] = 'Content-Type: application/json';

        $curl = curl_init();

        $url = $this->urlBaseApiInespay . $endpoint;
        if (strcasecmp(self::POST_HTTP, $httpVerb) === 0) {
            $dataJson = json_encode($data);
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $dataJson);
        } elseif (strcasecmp(self::GET_HTTP, $httpVerb) === 0) {
            $url = $url . '?' . http_build_query($data);
        }

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_ENCODING, 'UTF-8');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, self::CONNECT_TIMEOUT);
        curl_setopt($curl, CURLOPT_TIMEOUT, self::TIMEOUT);

        $result = curl_exec($curl);

        if (! curl_errno($curl)) {
            curl_close($curl);
            $result = json_decode($result);
        } else {
            throw new Exception(curl_error($curl));
        }

        return $result;
    }

    public static function getUrlBaseWithEnv($environmentApi): String
    {
        $urlBase = 'unknown';

        if ($environmentApi == InespayApiBase::ENV_TEST) {
            $urlBase = self::URL_TEST;
        } elseif ($environmentApi == InespayApiBase::ENV_SAN) {
            $urlBase = self::URL_SANDBOX;
        } elseif ($environmentApi == InespayApiBase::ENV_UAT) {
            $urlBase = self::URL_UAT;
        } elseif ($environmentApi == InespayApiBase::ENV_PRO) {
            $urlBase = self::URL_PRODUCTION;
        }

        return $urlBase;
    }
}