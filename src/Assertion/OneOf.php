<?php

namespace Ztsu\Irritator\Assertion;

class OneOf implements AssertionInterface
{
    /**
     * @var AssertionInterface[]
     */
    private $assertions = [];

    /**
     * @var string
     */
    private $exceptionMessage;

    /**
     * @param AssertionInterface[] $assertions
     * @param string $message
     */
    public function __construct(array $assertions, string $message = "Expected one of %d")
    {
        foreach ($assertions as $assertion) {
            if (!$assertion instanceof AssertionInterface) {
                throw new \InvalidArgumentException("Should implements AssertionInterface");
            }

            $this->assertions[] = $assertion;
        }

        $this->exceptionMessage = $message;
    }

    public function assert($value): bool
    {
        foreach ($this->assertions as $assertion) {
            try {
                if ($assertion->assert($value)) {
                    return true;
                }
            } catch (\Exception $exception) {
                //
            }
        }

        throw new \Exception(sprintf($this->exceptionMessage, count($this->assertions)));
    }

    public function __toString(): string
    {
        return "one of ";
    }
}
