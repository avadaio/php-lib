<?php

namespace AvadaIo\Http;


/*
|--------------------------------------------------------------------------
| CurlRequest
|--------------------------------------------------------------------------
|
| This class handles get, post, put, delete HTTP requests
|
*/

use Exception;

class CurlRequest
{
    /**
     * HTTP Code of the last executed request
     *
     * @var integer
     */
    public static $lastHttpCode;

    /**
     * HTTP response headers of last executed request
     *
     * @var array
     */
    public static $lastHttpResponseHeaders = array();

    /**
     * Curl additional configuration
     *
     * @var array
     */
    protected static $config = array();

    /**
     * Implement a GET request and return output
     *
     * @param string $url
     * @param array $httpHeaders
     *
     * @return string
     */
    public static function get($url, $httpHeaders = array())
    {
        //Initialize the Curl resource
        $ch = self::init($url, $httpHeaders);

        return self::processRequest($ch);
    }

    /**
     * Initialize the curl resource
     *
     * @param string $url
     * @param array $httpHeaders
     *
     * @return resource
     */
    protected static function init($url, $httpHeaders = array())
    {
        // Create Curl resource
        $ch = curl_init();

        // Set URL
        curl_setopt($ch, CURLOPT_URL, $url);

        //Return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'AvadaIo/AvadaSdk');

        foreach (self::$config as $option => $value) {
            curl_setopt($ch, $option, $value);
        }

        $headers = array();
        foreach ($httpHeaders as $key => $value) {
            $headers[] = "$key: $value";
        }
        //Set HTTP Headers
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        return $ch;

    }

    /**
     * Execute a request, release the resource and return output
     *
     * @param resource $ch
     *
     * @return string
     * @throws Exception if curl request is failed with error
     *
     */
    protected static function processRequest($ch)
    {
        $output = curl_exec($ch);
        $response = new CurlResponse($output);

        self::$lastHttpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if (curl_errno($ch)) {
            throw new Exception(curl_errno($ch) . ' : ' . curl_error($ch));
        }

        // close curl resource to free up system resources
        curl_close($ch);

        self::$lastHttpResponseHeaders = $response->getHeaders();

        return $response->getBody();
    }

    /**
     * Implement a POST request and return output
     *
     * @param string $url
     * @param array $data
     * @param array $httpHeaders
     *
     * @return string
     */
    public static function post($url, $data, $httpHeaders = array())
    {
        $ch = self::init($url, $httpHeaders);
        //Set the request type
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        return self::processRequest($ch);
    }

    /**
     * Implement a PUT request and return output
     *
     * @param string $url
     * @param array $data
     * @param array $httpHeaders
     *
     * @return string
     */
    public static function put($url, $data, $httpHeaders = array())
    {
        $ch = self::init($url, $httpHeaders);
        //set the request type
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        return self::processRequest($ch);
    }

    /**
     * Implement a DELETE request and return output
     *
     * @param string $url
     * @param array $data
     * @param array $httpHeaders
     *
     * @return string
     */
    public static function delete($url, $data, $httpHeaders = array())
    {
        $ch = self::init($url, $httpHeaders);
        //set the request type
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        return self::processRequest($ch);
    }

    /**
     * Set curl additional configuration
     *
     * @param array $config
     */
    public static function config($config = array())
    {
        self::$config = $config;
    }
}
