<?php

namespace FattureInCloud\ApiFilter;

use Antlr\Antlr4\Runtime\CommonTokenStream;
use Antlr\Antlr4\Runtime\Error\BailErrorStrategy;
use Antlr\Antlr4\Runtime\InputStream;
use Antlr\Antlr4\Runtime\Tree\AbstractParseTreeVisitor;
use FattureInCloud\ApiFilter\Filter\PatternOperator;
use FattureInCloud\ApiFilter\Filter\Comparison;
use FattureInCloud\ApiFilter\Filter\Condition;
use FattureInCloud\ApiFilter\Filter\Conjunction;
use FattureInCloud\ApiFilter\Filter\Disjunction;
use FattureInCloud\ApiFilter\Filter\EmptyField;
use FattureInCloud\ApiFilter\Filter\Expression;
use FattureInCloud\ApiFilter\Filter\FilledField;
use FattureInCloud\ApiFilter\Filter\Filter;
use FattureInCloud\ApiFilter\Filter\ComparisonOperator;
use FattureInCloud\ApiFilter\Filter\Pattern;
use FattureInCloud\ApiFilter\Parser\ApiFilterLexer;
use FattureInCloud\ApiFilter\Parser\ApiFilterParser;
use FattureInCloud\ApiFilter\Parser\ApiFilterVisitor;
use FattureInCloud\ApiFilter\Parser\Context;
use FattureInCloud\ApiFilter\Parser\Context\FilterContext;
use FattureInCloud\ApiFilter\Parser\Context\ConditionExpContext;
use FattureInCloud\ApiFilter\Parser\Context\IntegerContext;
use FattureInCloud\ApiFilter\Parser\Context\DecimalContext;
use FattureInCloud\ApiFilter\Parser\Context\ParenthesisExpContext;
use FattureInCloud\ApiFilter\Parser\Context\ConjunctionExpContext;
use FattureInCloud\ApiFilter\Parser\Context\DisjunctionExpContext;
use FattureInCloud\ApiFilter\Parser\Context\ValueContext;
use FattureInCloud\ApiFilter\Parser\Context\ComparisonopContext;

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

    public function visitPatternExp(Context\PatternExpContext $context)
    {
        return $this->visit($context->pattern());
    }

    public function visitParenthesisExp(ParenthesisExpContext $context): Expression
    {
        return $this->visit($context->expression());
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

    public function visitComparisonCondition(Context\ComparisonConditionContext $context): Comparison
    {
        return $this->visit($context->comparison());
    }

    public function visitComparison(Context\ComparisonContext $context): Comparison
    {
        $field = $context->FIELD()->getText();
        $op = $this->visit($context->comparisonop());
        $value = $this->visit($context->value());
        return new Comparison($field, $op, $value);
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

    public function visitComparisonop(ComparisonopContext $context)
    {
        $operator = null;
        if ($context->EQ()) {
            $operator = ComparisonOperator::EQ;
        } elseif ($context->GT()) {
            $operator = ComparisonOperator::GT;
        } elseif ($context->GTE()) {
            $operator = ComparisonOperator::GTE;
        } elseif ($context->LT()) {
            $operator = ComparisonOperator::LT;
        } elseif ($context->LTE()) {
            $operator = ComparisonOperator::LTE;
        } elseif ($context->NEQ()) {
            $operator = ComparisonOperator::NEQ;
        }
        return $operator;
    }

    public function visitEmptyCondition(Context\EmptyConditionContext $context): EmptyField
    {
        return $this->visit($context->emptyfield());
    }

    public function visitEmptyfield(Context\EmptyfieldContext $context): EmptyField
    {
        $field = $context->FIELD()->getText();
        return new EmptyField($field);
    }

    public function visitFilledCondition(Context\FilledConditionContext $context): FilledField
    {
        return $this->visit($context->filledfield());
    }

    public function visitFilledfield(Context\FilledfieldContext $context): FilledField
    {
        $field = $context->FIELD()->getText();
        return new FilledField($field);
    }

    public function visitPattern(Context\PatternContext $context)
    {
        $field = $context->FIELD()->getText();
        $op = $this->visit($context->patternop());
        $value = substr($context->STRING()->getText(), 1, -1);
        return new Pattern($field, $op, $value);
    }

    public function visitPatternop(Context\PatternopContext $context)
    {
        $op = null;
        if ($context->LIKE()) {
            $op = PatternOperator::LIKE;
        } elseif ($context->CONTAINS()) {
            $op = PatternOperator::CONTAINS;
        } elseif ($context->STARTSWITH()) {
            $op = PatternOperator::STARTS_WITH;
        } elseif ($context->ENDSWITH()) {
            $op = PatternOperator::ENDS_WITH;
        }
        return $op;
    }
}
