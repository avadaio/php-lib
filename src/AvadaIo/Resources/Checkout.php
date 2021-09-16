<?php

namespace AvadaIo\Resources;

use AvadaIo\AvadaIoSdk;
use AvadaIo\Data\ApiResponse;
use AvadaIo\Data\CheckoutInputData;

class Checkout
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
     * @description Create AVADA Email Marketing new checkout
     *
     * @param CheckoutInputData|array data
     * @return ApiResponse
     */
    public function create(array $data): ApiResponse
    {
        return $this->avadaio->makeRequest("/checkouts", 'POST', ["data" => $data]);
    }

    /**
     * @description Update AVADA Email Marketing existed checkout
     *
     * @param CheckoutInputData|array $data
     * @return ApiResponse
     */
    public function update(array $data): ApiResponse
    {
        return $this->avadaio->makeRequest("/checkouts", 'PUT', ["data" => $data]);
    }

    /**
     * @description Delete AVADA Email Marketing existed checkout
     *
     * @param string $id
     * @return ApiResponse
     */
    public function remove(string $id): ApiResponse
    {
        return $this->avadaio->makeRequest("/checkouts?id={$id}", 'DELETE', ["data" => []]);
    }
}

