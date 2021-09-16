<?php

namespace AvadaIo\Resources;

use AvadaIo\AvadaIoSdk;

class Review
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
     * @description Trigger review submit input data
     *
     * @param $data
     * @return mixed
     */
    public function submit($data)
    {
        return $this->avadaio->makeRequest("/triggers/review_submit", 'POST', ['data' => $data], false, true);
    }
}

