<?php

namespace Ztsu\Irritator\Assertion\String;

use Ztsu\Irritator\Assertion\AssertionInterface;
use Ztsu\Irritator\Exception\AssertException;
use Ztsu\Irritator\Exception\ExceptionInterface;

class StartsWith implements AssertionInterface
{
    /**
     * @var string
     */
    private $pattern;

    /**
     * @var ExceptionInterface
     */
    private $exception;

    /**
     * @param string $pattern
     * @param ExceptionInterface|null $exception
     */
    public function __construct(string $pattern, ExceptionInterface $exception = null)
    {
        $this->pattern = $pattern;
        $this->exception = $exception ?: new AssertException("value doesn't start with `{$pattern}`");
    }

    /**
     * @param $value
     * @return bool
     * @throws ExceptionInterface
     */
    public function assert($value): bool
    {
        if (strpos($value, $this->pattern) !== 0) {
            throw $this->exception;
        }

        return true;
    }
}