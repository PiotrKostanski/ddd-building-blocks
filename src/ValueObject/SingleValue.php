<?php

namespace Domain\ValueObject;

use Domain\Assert\Assert;
use Domain\Contracts\ValueObject\ValueObject;
use Domain\ValueObject\Util\Comparator;
use Respect\Validation\Validator;

abstract class SingleValue implements ValueObject
{
    protected $value;

    public static function fromNative()
    {
        return new static(func_get_arg(0));
    }

    public function __construct($value)
    {
        $this->assert()->is(static::validator(), $value);
        $this->value = $value;
    }

    public function sameValueAs(ValueObject $valueObject): bool
    {
        if (false === Comparator::classEquals($this, $valueObject)) {
            return false;
        }

        return $this->toNative() === call_user_func([$valueObject, 'toNative']);
    }

    protected function assert()
    {
        return new Assert(get_called_class());
    }

    protected function validator(): Validator
    {
        return Validator::create();
    }
}