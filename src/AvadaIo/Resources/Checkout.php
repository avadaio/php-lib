<?php

namespace AvadaIo\Resources;

use AvadaIo\AvadaIoSdk;

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
     * @param data
     * @return mixed
     */
    public function create($data)
    {
        return $this->avadaio->makeRequest("/checkouts", 'POST', ["data" => $data]);
    }

    /**
     * @description Update AVADA Email Marketing existed checkout
     *
     * @param $data
     * @return mixed
     */
    public function update($data)
    {
        return $this->avadaio->makeRequest("/checkouts", 'PUT', ["data" => $data]);
    }

    /**
     * @description Delete AVADA Email Marketing existed checkout
     *
     * @param $id
     * @return mixed
     */
    public function remove($id)
    {
        return $this->avadaio->makeRequest("/checkouts?id={$id}", 'DELETE', ["data" => []]);
    }
}

