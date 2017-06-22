<?php

namespace Domain\ValueObjects;

interface Comparable
{
    /**
     * Compares two ValueObject and tells whether they can be considered equal.
     *
     * @param  ValueObject $object
     * @return bool
     */
    public function sameValueAs(ValueObject $object): bool;
}