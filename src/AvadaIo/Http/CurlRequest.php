<?php

namespace AvadaIo\Http;


use AvadaIo\Exception\CurlException;
use AvadaIo\CurlResponse;

/*
|--------------------------------------------------------------------------
| CurlRequest
|--------------------------------------------------------------------------
|
| This class handles get, post, put, delete HTTP requests
|
*/

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
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_HEADER, true);

        foreach (self::$config as $option => $value) {
            curl_setopt($ch, $option, $value);
        }

        $headers = array();
        foreach ($httpHeaders as $key => $value) {
            $headers[] = "$key: $value";
        }
        //Set HTTP Headers
        var_dump($headers);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "X-EmailMarketing-App-Id:tTg4lFZkpV6vH74n6UB6",
            "X-EmailMarketing-Hmac-Sha256:EpzwcUB/2nzZr/JEXfsNwYtArZbG3K9Y3ONvjP0iXp4=",
            "Content-type:application/json",
            "Accept:application/json",
            "X-EmailMarketing-Connection-Test:true"
        ]);

        return $ch;

    }

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
     * @param array $httpHeaders
     *
     * @return string
     */
    public static function delete($url, $httpHeaders = array())
    {
        $ch = self::init($url, $httpHeaders);
        //set the request type
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');

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

    /**
     * Execute a request, release the resource and return output
     *
     * @param resource $ch
     *
     * @return string
     * @throws CurlException if curl request is failed with error
     *
     */
    protected static function processRequest($ch)
    {

        curl_setopt($ch, CURLINFO_HEADER_OUT, true);
        $output = curl_exec($ch);
        $info = curl_getinfo($ch);
        $headerSent = curl_getinfo($ch, CURLINFO_HEADER_OUT);
        $response = new CurlResponse($output);

        self::$lastHttpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if (curl_errno($ch)) {
            throw new Exception\CurlException(curl_errno($ch) . ' : ' . curl_error($ch));
        }

        // close curl resource to free up system resources
        curl_close($ch);

        self::$lastHttpResponseHeaders = $response->getHeaders();

        return $response->getBody();
    }

}
