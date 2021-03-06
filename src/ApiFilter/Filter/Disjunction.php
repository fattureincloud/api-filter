<?php

namespace FattureInCloud\ApiFilter\Filter;

class Disjunction implements Expression
{
    private $left;
    private $right;

    /**
     * @param Expression $left
     * @param Expression $right
     */
    public function __construct(Expression $left, Expression $right)
    {
        $this->left = $left;
        $this->right = $right;
    }

    /**
     * @return Expression
     */
    public function getLeft(): Expression
    {
        return $this->left;
    }

    /**
     * @param Expression $left
     */
    public function setLeft(Expression $left): void
    {
        $this->left = $left;
    }

    /**
     * @return Expression
     */
    public function getRight(): Expression
    {
        return $this->right;
    }

    /**
     * @param Expression $right
     */
    public function setRight(Expression $right): void
    {
        $this->right = $right;
    }

    public function __toString()
    {
        return "DISJUNCTION{ " . $this->left->__toString() . ", " . $this->right->__toString() . " }";
    }
}
