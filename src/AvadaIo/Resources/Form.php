<?php

namespace AvadaIo\Resources;

use AvadaIo\AvadaIoSdk;
use AvadaIo\Data\ApiResponse;

class Form
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
     * @description List all inline form for page builder integration with AVADA forms
     *
     * @return ApiResponse
     */
    public function list(): ApiResponse
    {
        return $this->avadaio->makeRequest("/forms", 'GET');
    }
}

