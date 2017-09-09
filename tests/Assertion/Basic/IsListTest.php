<?php

namespace Ztsu\Irritator\Assertion\Basic;

use PHPUnit\Framework\TestCase;
use Ztsu\Irritator\Assertion\IsString;
use Ztsu\Irritator\Exception\AssertException;

class IsListTest extends TestCase
{
    public function testEmptyList()
    {
        $assertion = new ListOf(new IsString());

        self::assertTrue($assertion->assert([]));
    }

    public function test()
    {
        $assertion = new ListOf(new IsString());

        self::assertTrue($assertion->assert(["", "1"]));
    }

    public function testGeneralException()
    {
        $assertion = new ListOf(new IsString());

        self::expectException(AssertException::class);

        $assertion->assert(null);
    }

    public function testConcreteException()
    {
        $assertion = new ListOf(new IsString());

        self::expectException(AssertException::class);

        $assertion->assert(["1", 1]);
    }
}
