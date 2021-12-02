<?php

/*
 * Generated from /grammar/ApiFilter.g4 by ANTLR 4.9.2
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
	 * Visit a parse tree produced by the `negationExp` labeled alternative
	 * in {@see ApiFilterParser::expression()}.
	 *
	 * @param Context\NegationExpContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitNegationExp(Context\NegationExpContext $context);

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
	 * Visit a parse tree produced by {@see ApiFilterParser::condition()}.
	 *
	 * @param Context\ConditionContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitCondition(Context\ConditionContext $context);

	/**
	 * Visit a parse tree produced by {@see ApiFilterParser::op()}.
	 *
	 * @param Context\OpContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitOp(Context\OpContext $context);

	/**
	 * Visit a parse tree produced by {@see ApiFilterParser::value()}.
	 *
	 * @param Context\ValueContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitValue(Context\ValueContext $context);

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