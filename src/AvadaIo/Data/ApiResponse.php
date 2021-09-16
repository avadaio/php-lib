<?php

namespace AvadaIo\Data;

class ApiResponse extends DataObject
{
    /**
     * @var boolean
     */
    public $success;

    /**
     * @var string
     */
    public $message;

    /**
     * @var array
     */
    public $data;
}