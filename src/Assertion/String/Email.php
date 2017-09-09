<?php

namespace Ztsu\Irritator\Assertion\String;

use Ztsu\Irritator\Assertion\AssertionInterface;
use Ztsu\Irritator\Exception\AssertException;
use Ztsu\Irritator\Exception\ExceptionInterface;

class Email implements AssertionInterface
{
    /**
     * @var ExceptionInterface
     */
    private $exception;

    /**
     * @param ExceptionInterface|null $exception
     */
    public function __construct(ExceptionInterface $exception = null)
    {
        $this->exception = $exception ?: new AssertException("is not an email");
    }

    /**
     * @param $value
     * @return bool
     * @throws ExceptionInterface
     */
    public function assert($value): bool
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw $this->exception;
        }

        return true;
    }

}