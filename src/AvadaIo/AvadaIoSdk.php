<?php

namespace AvadaIo;

use AvadaIo\Exception\SdkException;
use AvadaIo\Http\HttpRequestJson;
use AvadaIo\Resources\Checkout;
use AvadaIo\Resources\Connection;


/**
 * @property-read Connection $Connection
 * @property-read Checkout $Checkout
 *
 */
class AvadaIoSdk
{

    const DEFAULT_API_URL = 'app.avada.io';

    /**
     * @var string
     */
    protected $appId = null;

    /**
     * @var string
     */
    protected $appKey = null;

    /**
     * @var string
     */
    protected $apiUrl = null;

    /**
     * @var string[]
     */
    protected $resources = array(
        'Connection',
        'Form',
        'Contact',
        'Subscriber',
        'Review',
        'Checkout',
        'Order'
    );

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
            throw new SdkException('Missing or invalid options');
        }
        $this->appId = $config['appId'];
        $this->appKey = $config['appKey'];
        $this->apiUrl = $config['apiUrl'] ?? self::DEFAULT_API_URL;

        return $this;
    }

    /**
     * @param $endpoint
     * @param string $method
     * @param array $body
     * @param bool $isTest
     * @param bool $isTrigger
     * @return mixed
     */
    public function makeRequest($endpoint, string $method = 'POST', array $body = [], bool $isTest = false, bool $isTrigger = false)
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
            $headers['Content-Type'] = 'application/json';
        }
        if ($isTest) {
            $headers['X-EmailMarketing-Connection-Test'] = 'true';
        }
        if ($isTrigger) {
            $headers['X-AvadaTrigger-App-Id'] = 'true';
        }
        $curl_options[CURLOPT_HTTPHEADER] = $headers;

        if (!isset($body)) {
            $curl_options[CURLOPT_POSTFIELDS] = $body;
        }
        if ($method === 'DELETE') {
            return HttpRequestJson::delete($this->getApiUrl($endpoint), $body, $headers);
        }

        return HttpRequestJson::$method($this->getApiUrl($endpoint), $body, $headers);
    }

    /**
     * Helper getting the API URL
     *
     * @param $endpoint
     * @return string
     */
    public function getApiUrl($endpoint): string
    {
        return "https://{$this->apiUrl}/app/api/v1{$endpoint}";
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
     * @param $body
     * @param false $noHash
     * @return mixed|string|null
     */
    public function getHmac($body, bool $noHash = false)
    {
        if (!$noHash) {
            return base64_encode(hash_hmac('sha256', Helper::jsonEncode($body), $this->getAppKey(), true));
        }

        return $this->getAppKey();
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

    /**
     * Return AvadaIoSdk instance for a resource.
     * @example avadaio->Connection->test(); //Test the connection
     * Called like an object properties (without parenthesis)
     *
     * @param string $resourceName
     *
     * @return AvadaIoSdk
     */
    public function __get(string $resourceName)
    {
        return $this->$resourceName();
    }

    /**
     * Return AvadaIoSdk instance for a resource.
     * Called like an object method (with parenthesis) optionally with the resource ID as the first argument
     * @example avadaio->Connection->test(); //Test the connection
     *
     * @param string $resourceName
     * @param array $arguments
     *
     * @throws SdkException if the $name is not a valid AvadaIoSdk resource.
     *
     * @return AvadaIoSdk
     */
    public function __call(string $resourceName, array $arguments)
    {
        if (!in_array($resourceName, $this->resources)) {
            $message = "Invalid resource name $resourceName. Pls check the API Reference to get the appropriate resource name.";
            throw new SdkException($message);
        }

        $resourceClassName = __NAMESPACE__ . "\\Resources" . "\\$resourceName";

        //Initiate the resource object
        return new $resourceClassName($this);
    }
}

