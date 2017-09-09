<?php

namespace Ztsu\Irritator\Assertion;

use PHPUnit\Framework\TestCase;

class NullOrTest extends TestCase
{
    public function testNull()
    {
        $assertion = new NullOr(new IsInt());

        self::assertTrue($assertion->assert(null));
        self::assertTrue($assertion->assert(1));
    }

    public function testException()
    {
        self::expectException(\Exception::class);

        $assertion = new NullOr(new IsInt());

        $assertion->assert("");
    }
}