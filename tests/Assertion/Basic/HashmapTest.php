<?php

namespace Ztsu\Irritator\Assertion\Basic;

use PHPUnit\Framework\TestCase;
use Ztsu\Irritator\Assertion\IsString;
use Ztsu\Irritator\Assertion\NotRequired;

class HashmapTest extends TestCase
{
    public function test()
    {
        $assertion = new Hashmap(
            [
                "test" => new IsString(),
            ]
        );

        self::assertTrue($assertion->assert(["test" => ""]));
    }

    public function testException()
    {
        self::expectException(\Exception::class);

        $assertion = new Hashmap(
            [
                "test" => new IsString(),
            ]
        );

        $assertion->assert([]);
    }

    public function testNotRequiredException()
    {
        self::expectException(\Exception::class);

        $assertion = new Hashmap(
            [
                "test" => new NotRequired(new IsString()),
            ]
        );

        $assertion->assert(["test" => 0]);
    }
}