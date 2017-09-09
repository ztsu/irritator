<?php

namespace Ztsu\Irritator\Assertion;

use Ztsu\Irritator\Exception\ExceptionInterface;

class NullOr implements AssertionInterface
{
    /**
     * @var AssertionInterface
     */
    private $assertion;

    /**
     * @param AssertionInterface $assertion
     */
    public function __construct(AssertionInterface $assertion)
    {
        $this->assertion = $assertion;
    }

    /**
     * @param $value
     * @return bool
     * @throws ExceptionInterface
     */
    public function assert($value): bool
    {
        if ($value !== null) {
            return $this->assertion->assert($value);
        }

        return true;
    }
}