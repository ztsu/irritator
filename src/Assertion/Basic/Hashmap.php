<?php

namespace Ztsu\Irritator\Assertion\Basic;

use Ztsu\Irritator\Assertion\AssertionInterface;
use Ztsu\Irritator\Assertion\NotRequired;
use Ztsu\Irritator\Exception\AssertException;
use Ztsu\Irritator\Exception\ExceptionInterface;

class Hashmap implements AssertionInterface
{
    /**
     * @var AssertionInterface[]
     */
    private $schema;

    /**
     * @var ExceptionInterface
     */
    private $exception;

    /**
     * @param AssertionInterface[] $schema
     * @param ExceptionInterface|null $exception
     */
    public function __construct(array $schema = [], ExceptionInterface $exception = null)
    {
        foreach ($schema as $key => $value) {
            if (!$value instanceof AssertionInterface) {
                throw new \InvalidArgumentException("Should be AssertionInterface");
            }

            $this->schema[$key] = $value;
        }

        $this->exception = $exception ?: new AssertException("is not hashmap");
    }

    /**
     * @param $value
     * @return bool
     * @throws ExceptionInterface
     */
    public function assert($value): bool
    {
        if (!is_array($value)) {
            throw $this->exception;
        }

        foreach ($this->schema as $key => $assertion) {
            if (!array_key_exists($key, $value) && !$assertion instanceof NotRequired) {
                throw new AssertException("Key `{$key}` is required");
            }

            if (array_key_exists($key, $value)) {
                $assertion->assert($value[$key]);
            }
        }

        return true;
    }
}