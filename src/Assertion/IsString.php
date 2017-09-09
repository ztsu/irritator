<?php

namespace Ztsu\Irritator\Assertion;

class IsString implements AssertionInterface
{
    public function assert($value): bool
    {
        if (!is_string($value)) {
            throw new \Exception("Is string failed");
        }

        return true;
    }
}