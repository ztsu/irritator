<?php

namespace Ztsu\Irritator\Assertion;

class IsNumber implements AssertionInterface
{
    public function assert($value): bool
    {
        if (!is_numeric($value)) {
            throw new \Exception("Is numeric failed");
        }

        return true;
    }
}