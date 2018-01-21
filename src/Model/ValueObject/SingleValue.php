<?php

namespace WebGarden\Model\ValueObject;

use WebGarden\Model\Assert\Assert;

abstract class SingleValue implements ValueObject
{
    use ComparableValue;

    protected $value;

    /**
     * {@inheritDoc}
     */
    public static function fromNative()
    {
        return new static(func_get_arg(0));
    }

    public function __construct($value)
    {
        $this->assertThat($value);
        $this->value = $value;
    }

    /**
     * {@inheritDoc}
     */
    public function toNative()
    {
        return $this->value;
    }

    /**
     * @param  mixed $value
     *
     * @return \Assert\AssertionChain
     */
    protected function assertThat($value)
    {
        return Assert::that($value);
    }
}
