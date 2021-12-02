<?php

namespace FattureInCloud\ApiFilter;

use Antlr\Antlr4\Runtime\CommonTokenStream;
use Antlr\Antlr4\Runtime\Error\BailErrorStrategy;
use Antlr\Antlr4\Runtime\InputStream;
use Antlr\Antlr4\Runtime\Tree\AbstractParseTreeVisitor;
use FattureInCloud\ApiFilter\Filter\Condition;
use FattureInCloud\ApiFilter\Filter\Conjunction;
use FattureInCloud\ApiFilter\Filter\Disjunction;
use FattureInCloud\ApiFilter\Filter\Expression;
use FattureInCloud\ApiFilter\Filter\Filter;
use FattureInCloud\ApiFilter\Filter\Negation;
use FattureInCloud\ApiFilter\Filter\Operator;
use FattureInCloud\ApiFilter\Parser\ApiFilterLexer;
use FattureInCloud\ApiFilter\Parser\ApiFilterParser;
use FattureInCloud\ApiFilter\Parser\ApiFilterVisitor;
use FattureInCloud\ApiFilter\Parser\Context\FilterContext;
use FattureInCloud\ApiFilter\Parser\Context\ConditionExpContext;
use FattureInCloud\ApiFilter\Parser\Context\IntegerContext;
use FattureInCloud\ApiFilter\Parser\Context\DecimalContext;
use FattureInCloud\ApiFilter\Parser\Context\ParenthesisExpContext;
use FattureInCloud\ApiFilter\Parser\Context\NegationExpContext;
use FattureInCloud\ApiFilter\Parser\Context\ConjunctionExpContext;
use FattureInCloud\ApiFilter\Parser\Context\DisjunctionExpContext;
use FattureInCloud\ApiFilter\Parser\Context\ConditionContext;
use FattureInCloud\ApiFilter\Parser\Context\ValueContext;
use FattureInCloud\ApiFilter\Parser\Context\OpContext;

final class FilterFactory extends AbstractParseTreeVisitor implements ApiFilterVisitor
{

    public function initFilter(string $input): Filter
    {
        $lexer = new ApiFilterLexer(InputStream::fromString($input));
        $tokens = new CommonTokenStream($lexer);
        $parser = new ApiFilterParser($tokens);
        $parser->setErrorHandler(new BailErrorStrategy());
        $parser->setBuildParseTree(true);
        $tree = $parser->filter();

        return $this->visit($tree);
    }

    public function visitFilter(FilterContext $context): Filter
    {
        return new Filter($this->visit($context->expression()));
    }

    public function visitConditionExp(ConditionExpContext $context): Condition
    {
        return $this->visit($context->condition());
    }

    public function visitParenthesisExp(ParenthesisExpContext $context): Expression
    {
        return $this->visit($context->expression());
    }

    public function visitNegationExp(NegationExpContext $context): Negation
    {
        return new Negation($this->visit($context->expression()));
    }

    public function visitConjunctionExp(ConjunctionExpContext $context): Conjunction
    {
        $left = $this->visit($context->expression(0));
        $right = $this->visit($context->expression(1));
        return new Conjunction($left, $right);
    }

    public function visitDisjunctionExp(DisjunctionExpContext $context): Disjunction
    {
        $left = $this->visit($context->expression(0));
        $right = $this->visit($context->expression(1));
        return new Disjunction($left, $right);
    }

    public function visitCondition(ConditionContext $context): Condition
    {
        $field = $context->FIELD()->getText();
        $op = $this->visit($context->op());
        $value = $this->visit($context->value());
        return new Condition($field, $op, $value);
    }

    public function visitValue(ValueContext $context)
    {
        $value = null;
        if ($context->STRING()) {
            $value = substr($context->STRING()->getText(), 1, -1);
        } elseif ($context->BOOL()) {
            $value = filter_var($context->BOOL()->getText(), FILTER_VALIDATE_BOOLEAN);
        } elseif ($context->integer()) {
            $value = $this->visit($context->integer());
        } elseif ($context->decimal()) {
            $value = $this->visit($context->decimal());
        }
        return $value;
    }

    public function visitInteger(IntegerContext $context)
    {
        return intval($context->getText());
    }

    public function visitDecimal(DecimalContext $context)
    {
        return floatval($context->getText());
    }

    public function visitOp(OpContext $context)
    {
        $operator = null;
        if ($context->EQ()) {
            $operator = Operator::EQ;
        } elseif ($context->GT()) {
            $operator = Operator::GT;
        } elseif ($context->GTE()) {
            $operator = Operator::GTE;
        } elseif ($context->LT()) {
            $operator = Operator::LT;
        } elseif ($context->LTE()) {
            $operator = Operator::LTE;
        } elseif ($context->NEQ()) {
            $operator = Operator::NEQ;
        } elseif ($context->LIKE()) {
            $operator = Operator::LIKE;
        }
        return $operator;
    }
}
