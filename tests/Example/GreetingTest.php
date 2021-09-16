<?php

declare(strict_types=1);

namespace Tests\Example;

use PHPUnit\Framework\TestCase;
use AvadaIo\Greeting;

class GreetingTest extends TestCase
{
    public function testItGreetsUser(): void
    {
        $greeting = new Greeting('Rasmus Lerdorf');

        $this->assertSame('Hello Rasmus Lerdorf', $greeting->sayHello());
    }
}
