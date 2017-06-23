<?php

namespace Domain\Contracts\ValueObject;

interface NativeValue
{
    /**
     * Returns an object taking PHP native value(s) as argument(s).
     *
     * @return static
     */
    public static function fromNative();

    /**
     * Returns the native value of an object.
     */
    public function toNative();
}
