<?php

namespace AvadaIo;

class AvadaIoSdk
{
    private string $name;

    public function __construct(string $name = 'Stranger')
    {
        $this->name = $name;
    }

    public function sayHello(): string
    {
        return 'Hello ' . $this->name;
    }
}
