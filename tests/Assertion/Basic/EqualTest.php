<?php

namespace Ztsu\Irritator\Assertion\Basic;

use PHPUnit\Framework\TestCase;

class EqualTest extends TestCase
{
    public function testString()
    {
        $assertion = new Equal("some string");

        self::assertTrue($assertion->assert("some string"));
    }

    public function testIntAndString()
    {
        $assertion = new Equal(0);

        $this->assertTrue($assertion->assert(0));
    }

    public function testException()
    {
        self::expectException(\Exception::class);

        $assertion = new Equal(0);

        $assertion->assert("1");
    }
}
