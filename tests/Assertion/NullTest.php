<?php

namespace Ztsu\Irritator\Assertion;

use PHPUnit\Framework\TestCase;

class NullTest extends TestCase
{
    public function test()
    {
        $assertion = new IsNull();

        self::assertTrue($assertion->assert(null));
    }

    public function testException()
    {
        self::expectException(\Exception::class);

        $assertion = new IsNull();

        $assertion->assert("");
    }
}