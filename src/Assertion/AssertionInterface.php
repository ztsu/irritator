<?php

namespace Ztsu\Irritator\Assertion;

use Ztsu\Irritator\Exception\ExceptionInterface;

interface AssertionInterface
{
    /**
     * @param $value
     * @return bool
     * @throws ExceptionInterface
     */
    public function assert($value): bool;

//    /**
//     * @return string
//     */
//    public function __toString(): string;
}