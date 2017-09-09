<?php

namespace Ztsu\Irritator\Assertion\Basic;

use Ztsu\Irritator\Assertion\AssertionInterface;
use Ztsu\Irritator\Exception\AssertException;

class ListOf implements AssertionInterface
{
    private $assertion;

    private $exception;

    public function __construct(AssertionInterface $assertion, \Throwable $exception = null)
    {
        $this->assertion = $assertion;
        $this->exception = $exception ?: new AssertException("not a " . $this->__toString());
    }

    public function assert($value): bool
    {
        if (!is_array($value)) {
            throw $this->exception;
        }

        foreach ($value as $value) {
            try {
                $this->assertion->assert($value);

            } catch (\Exception $exception) {
                throw $this->exception;
            }
        }

        return true;
    }

    public function __toString(): string
    {
        return "list of " . $this->assertion->__toString();
    }
}