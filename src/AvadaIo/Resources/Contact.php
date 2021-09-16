<?php

namespace AvadaIo\Resources;

use AvadaIo\AvadaIoSdk;

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
     * @param $data
     * @return mixed
     */
    public function create($data)
    {
        return $this->avadaio->makeRequest("/customers", 'POST', ['data' => $data]);
    }

    /**
     * @description Update AVADA Email Marketing contact data
     *
     * @param $data
     * @return mixed
     */
    public function update($data)
    {
        return $this->avadaio->makeRequest("/customers", 'PUT', ['data' => $data]);
    }

    /**
     * @description Create AVADA Email Marketing new contacts in bulk
     *
     * @param $data
     * @return mixed
     */
    public function bulk($data)
    {
        return $this->avadaio->makeRequest("/customers/bulk", 'POST', ['data' => $data]);
    }
}

