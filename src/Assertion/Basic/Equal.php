<?php

namespace Ztsu\Irritator\Assertion\Basic;

use Ztsu\Irritator\Assertion\AssertionInterface;
use Ztsu\Irritator\Exception\AssertException;
use Ztsu\Irritator\Exception\ExceptionInterface;

class Equal implements AssertionInterface
{
    private $sample;

    private $exception;

    public function __construct($sample, ExceptionInterface $exception = null)
    {
        $this->sample = $sample;
        $this->exception = $exception ?: new AssertException("values are not equal");
    }

    public function assert($value): bool
    {
        if ($this->sample != $value) {
            throw $this->exception;
        }

        return true;
    }

    public function __toString(): string
    {
        return "equal";
    }
}