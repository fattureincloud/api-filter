<?php

/*
 * Generated from /grammar/ApiFilter.g4 by ANTLR 4.10.1
 */

namespace FattureInCloud\ApiFilter\Parser;

use Antlr\Antlr4\Runtime\Tree\ParseTreeVisitor;

/**
 * This interface defines a complete generic visitor for a parse tree produced by {@see ApiFilterParser}.
 */
interface ApiFilterVisitor extends ParseTreeVisitor
{
	/**
	 * Visit a parse tree produced by {@see ApiFilterParser::filter()}.
	 *
	 * @param Context\FilterContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitFilter(Context\FilterContext $context);

	/**
	 * Visit a parse tree produced by the `patternExp` labeled alternative
	 * in {@see ApiFilterParser::expression()}.
	 *
	 * @param Context\PatternExpContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitPatternExp(Context\PatternExpContext $context);

	/**
	 * Visit a parse tree produced by the `conjunctionExp` labeled alternative
	 * in {@see ApiFilterParser::expression()}.
	 *
	 * @param Context\ConjunctionExpContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitConjunctionExp(Context\ConjunctionExpContext $context);

	/**
	 * Visit a parse tree produced by the `disjunctionExp` labeled alternative
	 * in {@see ApiFilterParser::expression()}.
	 *
	 * @param Context\DisjunctionExpContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitDisjunctionExp(Context\DisjunctionExpContext $context);

	/**
	 * Visit a parse tree produced by the `conditionExp` labeled alternative
	 * in {@see ApiFilterParser::expression()}.
	 *
	 * @param Context\ConditionExpContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitConditionExp(Context\ConditionExpContext $context);

	/**
	 * Visit a parse tree produced by the `parenthesisExp` labeled alternative
	 * in {@see ApiFilterParser::expression()}.
	 *
	 * @param Context\ParenthesisExpContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitParenthesisExp(Context\ParenthesisExpContext $context);

	/**
	 * Visit a parse tree produced by the `comparisonCondition` labeled alternative
	 * in {@see ApiFilterParser::condition()}.
	 *
	 * @param Context\ComparisonConditionContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitComparisonCondition(Context\ComparisonConditionContext $context);

	/**
	 * Visit a parse tree produced by the `emptyCondition` labeled alternative
	 * in {@see ApiFilterParser::condition()}.
	 *
	 * @param Context\EmptyConditionContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitEmptyCondition(Context\EmptyConditionContext $context);

	/**
	 * Visit a parse tree produced by the `filledCondition` labeled alternative
	 * in {@see ApiFilterParser::condition()}.
	 *
	 * @param Context\FilledConditionContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitFilledCondition(Context\FilledConditionContext $context);

	/**
	 * Visit a parse tree produced by {@see ApiFilterParser::comparison()}.
	 *
	 * @param Context\ComparisonContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitComparison(Context\ComparisonContext $context);

	/**
	 * Visit a parse tree produced by {@see ApiFilterParser::emptyfield()}.
	 *
	 * @param Context\EmptyfieldContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitEmptyfield(Context\EmptyfieldContext $context);

	/**
	 * Visit a parse tree produced by {@see ApiFilterParser::filledfield()}.
	 *
	 * @param Context\FilledfieldContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitFilledfield(Context\FilledfieldContext $context);

	/**
	 * Visit a parse tree produced by {@see ApiFilterParser::comparisonop()}.
	 *
	 * @param Context\ComparisonopContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitComparisonop(Context\ComparisonopContext $context);

	/**
	 * Visit a parse tree produced by {@see ApiFilterParser::value()}.
	 *
	 * @param Context\ValueContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitValue(Context\ValueContext $context);

	/**
	 * Visit a parse tree produced by {@see ApiFilterParser::pattern()}.
	 *
	 * @param Context\PatternContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitPattern(Context\PatternContext $context);

	/**
	 * Visit a parse tree produced by {@see ApiFilterParser::patternop()}.
	 *
	 * @param Context\PatternopContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitPatternop(Context\PatternopContext $context);

	/**
	 * Visit a parse tree produced by {@see ApiFilterParser::integer()}.
	 *
	 * @param Context\IntegerContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitInteger(Context\IntegerContext $context);

	/**
	 * Visit a parse tree produced by {@see ApiFilterParser::decimal()}.
	 *
	 * @param Context\DecimalContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitDecimal(Context\DecimalContext $context);
}