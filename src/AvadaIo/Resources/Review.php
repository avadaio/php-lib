<?php

namespace AvadaIo\Resources;

use AvadaIo\AvadaIoSdk;
use AvadaIo\Data\ApiResponse;
use AvadaIo\Data\ReviewSubmitInputData;

class Review
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
     * @description Trigger review submit input data
     *
     * @param ReviewSubmitInputData|array $data
     * @return ApiResponse
     */
    public function submit(array $data): ApiResponse
    {
        return $this->avadaio->makeRequest("/triggers/review_submit", 'POST', ['data' => $data], false, true);
    }
}

