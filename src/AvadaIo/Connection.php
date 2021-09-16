<?php

namespace AvadaIo;

class Connection
{
    /**
     * @var AvadaIoSdk
     */
    protected $avadaio = null;

    public function __construct($avadaio)
    {
        $this->avadaio = $avadaio;
    }

    /**
     * Test the connection to AVADA Email Marketing app
     *
     * @return mixed
     */
    public function test()
    {
        return $this->avadaio->makeRequest("/connects", 'POST', [], true);
    }
}

