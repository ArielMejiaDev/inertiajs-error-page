<?php

namespace ArielMejiaDev\InertiajsErrorPage\Tests;

use Orchestra\Testbench\TestCase;
use ArielMejiaDev\InertiajsErrorPage\InertiajsErrorPageServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [InertiajsErrorPageServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
