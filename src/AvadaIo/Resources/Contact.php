<?php

namespace AvadaIo\Resources;

use AvadaIo\AvadaIoSdk;
use AvadaIo\Data\ApiResponse;
use AvadaIo\Data\ContactInputData;

class Contact
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
     * @description Create AVADA Email Marketing new contact
     *
     * @param ContactInputData|array $data
     * @return ApiResponse
     */
    public function create(array $data): ApiResponse
    {
        return $this->avadaio->makeRequest("/customers", 'POST', ['data' => $data]);
    }

    /**
     * @description Update AVADA Email Marketing contact data
     *
     * @param ContactInputData|array $data
     * @return ApiResponse
     */
    public function update(array $data): ApiResponse
    {
        return $this->avadaio->makeRequest("/customers", 'PUT', ['data' => $data]);
    }

    /**
     * @description Create AVADA Email Marketing new contacts in bulk
     *
     * @param ContactInputData[] $data
     * @return ApiResponse
     */
    public function bulk(array $data): ApiResponse
    {
        return $this->avadaio->makeRequest("/customers/bulk", 'POST', ['data' => $data]);
    }
}

