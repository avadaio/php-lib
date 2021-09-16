<?php

namespace AvadaIo;

use AvadaIo\Http\HttpRequestJson;

class AvadaIoSdk
{
    /**
     * @var string
     */
    protected $appId = null;

    /**
     * @var string
     */
    protected $appKey = null;

    /*
    * AvadaIoSdk constructor
    *
    * @param array $config
    *
    * @return void
    */
    public function __construct($config = array())
    {
        if (!$config['appId'] || !$config['appKey']) {
            throw new \Exception('Missing or invalid options');
        }
        $this->appId = $config['appId'];
        $this->appKey = $config['appKey'];

        return $this;
    }

    /**
     * Getter for app id
     *
     * @return mixed|string|null
     */
    public function getAppId()
    {
        return $this->appId;
    }

    /**
     * Getter for app key
     *
     * @return mixed|string|null
     */
    public function getAppKey()
    {
        return $this->appKey;
    }

    public function getApiUrl($endpoint)
    {
        return 'https://app.avada.io/app/api/v1' . $endpoint;
    }

    /**
     * @param $body
     * @param false $noHash
     * @return mixed|string|null
     */
    public function getHmac($body, $noHash = false)
    {
        if (!$noHash) {
            return base64_encode(hash_hmac('sha256', json_encode($body, JSON_FORCE_OBJECT), $this->getAppKey(), true));
        }

        return $this->getAppKey();
    }

    /**
     * @param $endpoint
     * @param string $method
     * @param array $body
     * @param false $isTest
     * @param false $isTrigger
     */
    public function makeRequest($endpoint, $method = 'POST', $body = [], $isTest = false, $isTrigger = false)
    {
        $curl_options = [
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_RETURNTRANSFER => true,
        ];
        $curl_options[CURLOPT_URL] = $this->getApiUrl($endpoint);
        $headers = [
            'X-EmailMarketing-App-Id' => $this->getAppId(),
            'X-EmailMarketing-Hmac-Sha256' => $this->getHmac($body, $method === 'GET')
        ];
        if ($method !== 'GET') {
            $headers['Content-type'] = 'application/json';
        }
        if ($isTest) {
            $headers['X-EmailMarketing-Connection-Test'] = true;
        }
        if ($isTrigger) {
            $headers['X-Avadatrigger-App-Id'] = true;
        }
        $curl_options[CURLOPT_HTTPHEADER] = $headers;

        if (!isset($body)) {
            $curl_options[CURLOPT_POSTFIELDS] = $body;
        }

        return HttpRequestJson::$method($this->getApiUrl($endpoint), $body, $headers);
    }
}

