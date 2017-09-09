<?php

namespace Ztsu\Irritator\Assertion;

class IsInt implements AssertionInterface
{
    public function assert($value): bool
    {
        if (!is_int($value)) {
            throw new \Exception("Is Int failed");
        }

        return true;
    }
}