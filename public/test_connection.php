<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use AvadaIo\AvadaIoSdk;

try {
    var_dump(
        json_encode(["data" => []])
    );
//    $avadaio = new AvadaIoSdk(['appId' => "tTg4lFZkpV6vH74n6UB6", "appKey" => "d3af7f191829062d877871d4b28c3445"]);
//    $result = $avadaio->makeRequest("/connects", 'POST', [], true);
//    $result = $avadaio->Connection->test();
//    var_dump($result);
} catch (Exception $e) {
    echo "error";
    echo $e->getMessage();
}