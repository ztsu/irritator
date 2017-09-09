<?php

namespace Ztsu\Irritator\Assertion;

class NotRequired implements AssertionInterface
{
    private $assertion;

    public function __construct(AssertionInterface $assertion)
    {
        $this->assertion = $assertion;
    }

    public function assert($value): bool
    {
        return $this->assertion->assert($value);
    }
}