<?php

namespace AvadaIo;

use AvadaIo\Http\HttpRequestJson;


/**
 * @property-read Connection $Connection
 *
 */
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

        return HttpRequestJson::$method($this->getApiUrl($endpoint), $body, $headers);
    }

    /**
     * Return ShopifyResource instance for a resource.
     * @example $shopify->Product->get(); //Returns all available Products
     * Called like an object properties (without parenthesis)
     *
     * @param string $resourceName
     *
     * @return AvadaIoSdk
     */
    public function __get($resourceName)
    {
        return $this->$resourceName();
    }

    /**
     * Return ShopifyResource instance for a resource.
     * Called like an object method (with parenthesis) optionally with the resource ID as the first argument
     * @example avadaio->Connection->test(); //Return a specific product defined by $productID
     *
     * @param string $resourceName
     * @param array $arguments
     *
     * @throws Exception if the $name is not a valid ShopifyResource resource.
     *
     * @return AvadaIoSdk
     */
    public function __call($resourceName, $arguments)
    {
        if (!in_array($resourceName, $this->resources)) {
            $message = "Invalid resource name $resourceName. Pls check the API Reference to get the appropriate resource name.";
            throw new \Exception($message);
        }

        $resourceClassName = __NAMESPACE__ . "\\$resourceName";

        //If first argument is provided, it will be considered as the ID of the resource.
        $resourceID = !empty($arguments) ? $arguments[0] : null;

        //Initiate the resource object
        return new $resourceClassName($this);
    }
}

