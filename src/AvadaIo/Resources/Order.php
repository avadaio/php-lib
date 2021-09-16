<?php

namespace AvadaIo\Resources;

use AvadaIo\AvadaIoSdk;

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
     * @param $data
     * @return mixed
     */
    public function create($data)
    {
        return $this->avadaio->makeRequest("/orders", 'POST', ['data' => $data]);
    }

    /**
     * @description Update AVADA Email Marketing existed order
     *
     * @param $data
     * @return mixed
     */
    public function update($data)
    {
        return $this->avadaio->makeRequest("/orders", 'PUT', ['data' => $data]);
    }

    /**
     * @description Complete AVADA Email Marketing new order
     *
     * @param $data
     * @return mixed
     */
    public function complete($data)
    {
        return $this->avadaio->makeRequest("/orders/complete", 'POST', ['data' => $data]);
    }

    /**
     * @description Create AVADA Email Marketing new orders in bulk
     *
     * @param $data
     * @return mixed
     */
    public function bulk($data)
    {
        return $this->avadaio->makeRequest("/orders/bulk", 'POST', ['data' => $data]);
    }

    /**
     * @description Trigger AVADA Email Marketing new refund event
     *
     * @param $data
     * @return mixed
     */
    public function refund($data)
    {
        return $this->avadaio->makeRequest("/orders/refund", 'POST', ['data' => $data]);
    }

    /**
     * @description Trigger AVADA Email Marketing new refund event
     *
     * @param $data
     * @return mixed
     */
    public function invoice($data)
    {
        return $this->avadaio->makeRequest("/orders/invoice", 'POST', ['data' => $data]);
    }

    /**
     * @description Trigger AVADA Email Marketing new shipment event
     *
     * @param $data
     * @return mixed
     */
    public function ship($data)
    {
        return $this->avadaio->makeRequest("/orders/ship", 'POST', ['data' => $data]);
    }
}

