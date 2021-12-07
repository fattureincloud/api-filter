<?php

namespace FattureInCloud\ApiFilter\Filter;

class EmptyField implements Condition
{
    private $field;

    /**
     * @param $field
     */
    public function __construct($field)
    {
        $this->field = $field;
    }

    /**
     * @return string
     */
    public function getField(): string
    {
        return $this->field;
    }

    /**
     * @param string $field
     */
    public function setField(string $field): void
    {
        $this->field = $field;
    }

    public function __toString(): string
    {
        return $this->field . " = NULL";
    }
}