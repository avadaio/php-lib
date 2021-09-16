<?php

namespace AvadaIo\Resources;

use AvadaIo\AvadaIoSdk;
use AvadaIo\Data\ApiResponse;
use AvadaIo\Data\ContactInputData;

class Subscriber
{
    /**
     * The AVADA SDK instance
     *
     * @var AvadaIoSdk
     */
    protected $avadaio = null;

    /**
     *
     * @param AvadaIoSdk $avadaio
     */
    public function __construct(AvadaIoSdk $avadaio)
    {
        $this->avadaio = $avadaio;
    }

    /**
     * @description Create new subscriber in AVADA Email Marketing, trigger the automation event
     *
     * @param ContactInputData|array $data
     * @return ApiResponse
     */
    public function add(array $data): ApiResponse
    {
        return $this->avadaio->makeRequest("/subscribers", 'POST', ['data' => $data]);
    }
}

