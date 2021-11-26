<?php

namespace FattureInCloud\ApiFilter\Filter;

class Negation implements Expression
{
    private $negated;

    /**
     * @param Expression $negated
     */
    public function __construct(Expression $negated)
    {
        $this->negated = $negated;
    }

    /**
     * @return Expression
     */
    public function getNegated(): Expression
    {
        return $this->negated;
    }

    /**
     * @param Expression $negated
     */
    public function setNegated(Expression $negated): void
    {
        $this->negated = $negated;
    }

    public function __toString()
    {
        return "NEGATION{ " . $this->negated->__toString() . " }";
    }
}
