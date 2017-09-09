<?php

namespace Ztsu\Irritator\Assertion;

use PHPUnit\Framework\TestCase;
use Ztsu\Irritator\Assertion\Basic\Equal;

class OneOfTest extends TestCase
{
    public function test()
    {
        $assertion = new OneOf(
            [
                new IsString(),
                new IsInt()
            ]
        );

        self::assertTrue($assertion->assert(""));
        self::assertTrue($assertion->assert(1));
    }

    public function testException()
    {
        self::expectException(\Exception::class);
        self::expectExceptionMessage("Expected one of 2");

        $assertion = new OneOf(
            [
                new Equal(0),
                new Equal(1)
            ]
        );

        $assertion->assert(2);
    }
}