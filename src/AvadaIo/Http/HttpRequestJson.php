<?php

namespace AvadaIo\Http;

use AvadaIo\Helper;

/**
 * Class HttpRequestJson
 *
 * Prepare the data / headers for JSON requests, make the call and decode the response
 * Accepts data in array format returns data in array format
 *
 * @uses CurlRequest
 *
 */
class HttpRequestJson
{

    /**
     * HTTP request headers
     *
     * @var array
     */
    protected static $httpHeaders;

    /**
     * Prepared JSON string to be posted with request
     *
     * @var string
     */
    private static $postDataJSON;

    /**
     * Implement a GET request and return json decoded output
     *
     * @param string $url
     * @param array $httpHeaders
     *
     * @return array
     */
    public static function get($url, $httpHeaders = array())
    {
        self::prepareRequest($httpHeaders);

        $response = CurlRequest::get($url, self::$httpHeaders);

        return self::processResponse($response);
    }

    /**
     * Prepare the data and request headers before making the call
     *
     * @param array $httpHeaders
     * @param array $dataArray
     *
     * @return void
     */
    protected static function prepareRequest(array $httpHeaders = array(), array $dataArray = array())
    {
        if (!empty($dataArray)) {
            self::$postDataJSON = Helper::jsonEncode($dataArray);
        }
        self::$httpHeaders = $httpHeaders;
    }

    /**
     * Decode JSON response
     *
     * @param string $response
     *
     * @return array
     */
    protected static function processResponse($response)
    {
        return json_decode($response, true);
    }

    /**
     * Implement a POST request and return json decoded output
     *
     * @param string $url
     * @param array $dataArray
     * @param array $httpHeaders
     *
     * @return array
     */
    public static function post($url, $dataArray, $httpHeaders = array())
    {
        self::prepareRequest($httpHeaders, $dataArray);
        $response = CurlRequest::post($url, self::$postDataJSON, self::$httpHeaders);

        return self::processResponse($response);
    }

    /**
     * Implement a PUT request and return json decoded output
     *
     * @param string $url
     * @param array $dataArray
     * @param array $httpHeaders
     *
     * @return array
     */
    public static function put($url, $dataArray, $httpHeaders = array())
    {
        self::prepareRequest($httpHeaders, $dataArray);

        $response = CurlRequest::put($url, self::$postDataJSON, self::$httpHeaders);

        return self::processResponse($response);
    }

    /**
     * Implement a DELETE request and return json decoded output
     *
     * @param string $url
     * @param array $dataArray
     * @param array $httpHeaders
     *
     * @return array
     */
    public static function delete($url, $dataArray, $httpHeaders = array())
    {
        self::prepareRequest($httpHeaders, $dataArray);

        $response = CurlRequest::delete($url, self::$postDataJSON, self::$httpHeaders);

        return self::processResponse($response);
    }

}