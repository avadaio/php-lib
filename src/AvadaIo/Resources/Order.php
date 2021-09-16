<?php

namespace AvadaIo\Resources;

use AvadaIo\AvadaIoSdk;
use AvadaIo\Data\ApiResponse;
use AvadaIo\Data\InvoiceInputData;
use AvadaIo\Data\OrderCreateInputData;
use AvadaIo\Data\OrderUpdateInputData;
use AvadaIo\Data\RefundInputData;
use AvadaIo\Data\ShipInputData;

class Order
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
     * @description Create AVADA Email Marketing new order
     *
     * @param OrderCreateInputData|array $data
     * @return ApiResponse
     */
    public function create(array $data): ApiResponse
    {
        return $this->avadaio->makeRequest("/orders", 'POST', ['data' => $data]);
    }

    /**
     * @description Update AVADA Email Marketing existed order
     *
     * @param OrderUpdateInputData|array $data
     * @return ApiResponse
     */
    public function update(array $data): ApiResponse
    {
        return $this->avadaio->makeRequest("/orders", 'PUT', ['data' => $data]);
    }

    /**
     * @description Complete AVADA Email Marketing new order
     *
     * @param OrderCreateInputData|array $data
     * @return ApiResponse
     */
    public function complete(array $data): ApiResponse
    {
        return $this->avadaio->makeRequest("/orders/complete", 'POST', ['data' => $data]);
    }

    /**
     * @description Create AVADA Email Marketing new orders in bulk
     *
     * @param OrderCreateInputData[]|array $data
     * @return ApiResponse
     */
    public function bulk(array $data): ApiResponse
    {
        return $this->avadaio->makeRequest("/orders/bulk", 'POST', ['data' => $data]);
    }

    /**
     * @description Trigger AVADA Email Marketing new refund event
     *
     * @param RefundInputData|array $data
     * @return ApiResponse
     */
    public function refund(array $data): ApiResponse
    {
        return $this->avadaio->makeRequest("/orders/refund", 'POST', ['data' => $data]);
    }

    /**
     * @description Trigger AVADA Email Marketing new refund event
     *
     * @param InvoiceInputData|array $data
     * @return ApiResponse
     */
    public function invoice(array $data): ApiResponse
    {
        return $this->avadaio->makeRequest("/orders/invoice", 'POST', ['data' => $data]);
    }

    /**
     * @description Trigger AVADA Email Marketing new shipment event
     *
     * @param ShipInputData|array $data
     * @return ApiResponse
     */
    public function ship(array $data): ApiResponse
    {
        return $this->avadaio->makeRequest("/orders/ship", 'POST', ['data' => $data]);
    }
}

