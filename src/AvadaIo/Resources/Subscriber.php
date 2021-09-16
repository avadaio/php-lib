<?php

namespace AvadaIo\Resources;

use AvadaIo\AvadaIoSdk;

class Subscriber
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
     * @description Create new subscriber in AVADA Email Marketing, trigger the automation event
     *
     * @param $data
     * @return mixed
     */
    public function add($data)
    {
        return $this->avadaio->makeRequest("/subscribers", 'POST', ['data' => $data]);
    }
}

