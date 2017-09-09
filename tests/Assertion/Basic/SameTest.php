<?php

namespace Ztsu\Irritator\Assertion\Basic;

use PHPUnit\Framework\TestCase;
use Ztsu\Irritator\Exception\AssertException;

class SameTest extends TestCase
{
    public function test()
    {
        $assertion = new Same("1");

        self::assertTrue($assertion->assert("1"));
    }

    public function testException()
    {
        self::expectException(AssertException::class);

        $assertion = new Same("1");

        $assertion->assert(1);
    }
}