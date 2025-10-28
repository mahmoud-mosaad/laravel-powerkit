<?php

namespace MahmoudMosaad\PowerKit\Tests\Feature;

use MahmoudMosaad\PowerKit\Facades\PowerKit;
use MahmoudMosaad\PowerKit\Tests\TestCase;

class PowerKitTest extends TestCase
{
    /** @test */
    public function it_returns_expected_message()
    {
        $result = PowerKit::sayHello();

        $this->assertEquals('Hello from PowerKit!', $result);
    }
}
