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
     * @param data
     * @return mixed
     */
    public function create($data)
    {
        return $this->avadaio->makeRequest("/checkouts", 'POST', ["data" => $data]);
    }

    /**
     * @param $data
     * @return mixed
     */
    public function update($data)
    {
        return $this->avadaio->makeRequest("/checkouts", 'PUT', ["data" => $data]);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function remove($id)
    {
        return $this->avadaio->makeRequest("/checkouts?id={$id}", 'DELETE', ["data" => []]);
    }
}

