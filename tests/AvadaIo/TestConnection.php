<?php

declare(strict_types=1);

namespace UnitTest\AvadaIo;

use AvadaIo\AvadaIoSdk;
use AvadaIo\Exception\SdkException;
use PHPUnit\Framework\TestCase;

class TestConnection extends TestCase
{
    /**
     * @throws SdkException
     */
    public function testItGreetsUser(): void
    {
        $avadaio = new AvadaIoSdk(['appId' => "tTg4lFZkpV6vH74n6UB6", "appKey" => "d3af7f191829062d877871d4b28c3445"]);
        $result = $avadaio->Connection->test();

        $this->assertSame($result->success, true);
    }
}
