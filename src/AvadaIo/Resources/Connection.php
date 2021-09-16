<?php

namespace AvadaIo\Resources;

use AvadaIo\AvadaIoSdk;
use AvadaIo\Data\ApiResponse;

class Connection
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
     * Test the connection to AVADA Email Marketing app
     *
     * @return ApiResponse
     */
    public function test(): ApiResponse
    {
        return $this->avadaio->makeRequest("/connects", 'POST', [], true);
    }
}

