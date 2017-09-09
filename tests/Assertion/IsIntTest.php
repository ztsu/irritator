<?php

namespace Ztsu\Irritator\Assertion;

use PHPUnit\Framework\TestCase;

class IsIntTest extends TestCase
{
    public function test()
    {
        $assertion = new IsInt();

        self::assertTrue($assertion->assert(1));
    }
}