<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use AvadaIo\AvadaIoSdk;

$greeting = new AvadaIoSdk('Ada Lovelace');

echo $greeting->sayHello();
