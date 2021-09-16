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

    public function create($data)
    {
        return $this->avadaio->makeRequest("/customers", 'POST', ['data' => $data]);
    }


    public function update($data)
    {
        return $this->avadaio->makeRequest("/customers", 'PUT', ['data' => $data]);
    }

    public function bulk($data)
    {
        return $this->avadaio->makeRequest("/customers/bulk", 'POST', ['data' => $data]);
    }
}

