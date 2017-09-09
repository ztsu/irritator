<?php

namespace Ztsu\Irritator;

use Ztsu\Irritator\Assertion\Basic\ListOf;
use Ztsu\Irritator\Assertion\IsString;
use Ztsu\Irritator\Assertion\NotRequired;
use Ztsu\Irritator\Assertion\AssertionInterface;
use Ztsu\Irritator\Assertion\Basic\Equal;
use Ztsu\Irritator\Assertion\Basic\Hashmap;
use Ztsu\Irritator\Assertion\IsInt;
use Ztsu\Irritator\Assertion\IsNotRequired;
use Ztsu\Irritator\Assertion\IsNumber;
use Ztsu\Irritator\Assertion\OneOf;
use Ztsu\Irritator\Assertion\Basic\Same;
use Ztsu\Irritator\Assertion\String\StartsWith;

function equal($sample): AssertionInterface
{
    return new Equal($sample);
}

function same($sample): AssertionInterface
{
    return new Same($sample);
}

function int(): AssertionInterface
{
    return new IsInt();
}

function hashmap(array $schema = []): AssertionInterface
{
    return new Hashmap($schema);
}

function number(): AssertionInterface
{
    return new IsNumber();
}

function string(): AssertionInterface
{
    return new IsString();
}

function startsWith(string $pattern): AssertionInterface
{
    return new StartsWith($pattern);
}

function oneOf(array $assertions): AssertionInterface
{
    return new OneOf($assertions);
}

function notRequired(AssertionInterface $assertion): AssertionInterface
{
    return new NotRequired($assertion);
}

function listOf(AssertionInterface $assertion): AssertionInterface
{
    return new ListOf($assertion);
}

function listOfStrings()
{
    return new ListOf(new IsString());
}

function listOfInts()
{
    return new ListOf(new IsInt());
}

function listOfNumbers()
{
    return new ListOf(new IsNumber());
}