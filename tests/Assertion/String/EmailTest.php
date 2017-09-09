<?php

namespace Ztsu\Irrator\Assertion\String;

use PHPUnit\Framework\TestCase;
use Ztsu\Irritator\Assertion\String\Email;
use Ztsu\Irritator\Exception\AssertException;

class EmailTest extends TestCase
{
    public function test()
    {
        $assertion = new Email();

        $this->assertTrue($assertion->assert("asd@asas.ru"));
    }

    public function testException()
    {
        $assertion = new Email();

        $this->expectException(AssertException::class);

        $assertion->assert("fff");
    }
}
