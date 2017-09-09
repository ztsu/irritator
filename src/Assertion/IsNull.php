<?php

namespace Ztsu\Irritator\Assertion;

class IsNull implements AssertionInterface
{
    public function assert($value): bool
    {
        if ($value !== null) {
            throw new \Exception("Should be null");
        }

        return true;
    }
}