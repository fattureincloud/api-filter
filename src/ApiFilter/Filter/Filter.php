<?php

namespace FattureInCloud\ApiFilter\Filter;

class Filter
{
    private $expression;

    /**
     * @param Expression $expression
     */
    public function __construct(Expression $expression)
    {
        $this->expression = $expression;
    }

    /**
     * @return Expression
     */
    public function getExpression(): Expression
    {
        return $this->expression;
    }

    /**
     * @param Expression $expression
     */
    public function setExpression(Expression $expression): void
    {
        $this->expression = $expression;
    }

    public function __toString()
    {
        return "FILTER{ " . $this->expression->__toString() . " }";
    }
}
