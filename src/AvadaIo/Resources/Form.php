<?php

namespace AvadaIo\Resources;

use AvadaIo\AvadaIoSdk;

class Form
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
     * @description List all inline form for page builder integration with AVADA forms
     *
     * @return mixed
     */
    public function list()
    {
        return $this->avadaio->makeRequest("/forms", 'GET');
    }
}

