<?php

/*
 * Generated from /grammar/ApiFilter.g4 by ANTLR 4.9.2
 */

namespace FattureInCloud\ApiFilter\Parser {
	use Antlr\Antlr4\Runtime\Atn\ATN;
	use Antlr\Antlr4\Runtime\Atn\ATNDeserializer;
	use Antlr\Antlr4\Runtime\Atn\ParserATNSimulator;
	use Antlr\Antlr4\Runtime\Dfa\DFA;
	use Antlr\Antlr4\Runtime\Error\Exceptions\FailedPredicateException;
	use Antlr\Antlr4\Runtime\Error\Exceptions\NoViableAltException;
	use Antlr\Antlr4\Runtime\PredictionContexts\PredictionContextCache;
	use Antlr\Antlr4\Runtime\Error\Exceptions\RecognitionException;
	use Antlr\Antlr4\Runtime\RuleContext;
	use Antlr\Antlr4\Runtime\Token;
	use Antlr\Antlr4\Runtime\TokenStream;
	use Antlr\Antlr4\Runtime\Vocabulary;
	use Antlr\Antlr4\Runtime\VocabularyImpl;
	use Antlr\Antlr4\Runtime\RuntimeMetaData;
	use Antlr\Antlr4\Runtime\Parser;

	final class ApiFilterParser extends Parser
	{
		public const EQ = 1, GT = 2, GTE = 3, LT = 4, LTE = 5, NEQ = 6, LIKE = 7, 
               BOOL = 8, STRING = 9, AND = 10, OR = 11, NOT = 12, OPEN_PAR = 13, 
               CLOSE_PAR = 14, DOT = 15, INT = 16, FIELD = 17, WS = 18;

		public const RULE_filter = 0, RULE_expression = 1, RULE_condition = 2, 
               RULE_op = 3, RULE_value = 4, RULE_integer = 5, RULE_double = 6;

		/**
		 * @var array<string>
		 */
		public const RULE_NAMES = [
			'filter', 'expression', 'condition', 'op', 'value', 'integer', 'double'
		];

		/**
		 * @var array<string|null>
		 */
		private const LITERAL_NAMES = [
		    null, "'='", "'>'", "'>='", "'<'", "'<='", null, null, null, null, 
		    null, null, null, "'('", "')'", "'.'"
		];

		/**
		 * @var array<string>
		 */
		private const SYMBOLIC_NAMES = [
		    null, "EQ", "GT", "GTE", "LT", "LTE", "NEQ", "LIKE", "BOOL", "STRING", 
		    "AND", "OR", "NOT", "OPEN_PAR", "CLOSE_PAR", "DOT", "INT", "FIELD", 
		    "WS"
		];

		/**
		 * @var string
		 */
		private const SERIALIZED_ATN =
			"\u{3}\u{608B}\u{A72A}\u{8133}\u{B9ED}\u{417C}\u{3BE7}\u{7786}\u{5964}" .
		    "\u{3}\u{14}\u{3B}\u{4}\u{2}\u{9}\u{2}\u{4}\u{3}\u{9}\u{3}\u{4}\u{4}" .
		    "\u{9}\u{4}\u{4}\u{5}\u{9}\u{5}\u{4}\u{6}\u{9}\u{6}\u{4}\u{7}\u{9}" .
		    "\u{7}\u{4}\u{8}\u{9}\u{8}\u{3}\u{2}\u{3}\u{2}\u{3}\u{2}\u{3}\u{3}" .
		    "\u{3}\u{3}\u{3}\u{3}\u{3}\u{3}\u{3}\u{3}\u{3}\u{3}\u{3}\u{3}\u{3}" .
		    "\u{3}\u{5}\u{3}\u{1C}\u{A}\u{3}\u{3}\u{3}\u{3}\u{3}\u{3}\u{3}\u{3}" .
		    "\u{3}\u{3}\u{3}\u{3}\u{3}\u{7}\u{3}\u{24}\u{A}\u{3}\u{C}\u{3}\u{E}" .
		    "\u{3}\u{27}\u{B}\u{3}\u{3}\u{4}\u{3}\u{4}\u{3}\u{4}\u{3}\u{4}\u{3}" .
		    "\u{5}\u{3}\u{5}\u{3}\u{6}\u{3}\u{6}\u{3}\u{6}\u{3}\u{6}\u{5}\u{6}" .
		    "\u{33}\u{A}\u{6}\u{3}\u{7}\u{3}\u{7}\u{3}\u{8}\u{3}\u{8}\u{3}\u{8}" .
		    "\u{3}\u{8}\u{3}\u{8}\u{2}\u{3}\u{4}\u{9}\u{2}\u{4}\u{6}\u{8}\u{A}" .
		    "\u{C}\u{E}\u{2}\u{3}\u{3}\u{2}\u{3}\u{9}\u{2}\u{3A}\u{2}\u{10}\u{3}" .
		    "\u{2}\u{2}\u{2}\u{4}\u{1B}\u{3}\u{2}\u{2}\u{2}\u{6}\u{28}\u{3}\u{2}" .
		    "\u{2}\u{2}\u{8}\u{2C}\u{3}\u{2}\u{2}\u{2}\u{A}\u{32}\u{3}\u{2}\u{2}" .
		    "\u{2}\u{C}\u{34}\u{3}\u{2}\u{2}\u{2}\u{E}\u{36}\u{3}\u{2}\u{2}\u{2}" .
		    "\u{10}\u{11}\u{5}\u{4}\u{3}\u{2}\u{11}\u{12}\u{7}\u{2}\u{2}\u{3}\u{12}" .
		    "\u{3}\u{3}\u{2}\u{2}\u{2}\u{13}\u{14}\u{8}\u{3}\u{1}\u{2}\u{14}\u{1C}" .
		    "\u{5}\u{6}\u{4}\u{2}\u{15}\u{16}\u{7}\u{F}\u{2}\u{2}\u{16}\u{17}\u{5}" .
		    "\u{4}\u{3}\u{2}\u{17}\u{18}\u{7}\u{10}\u{2}\u{2}\u{18}\u{1C}\u{3}" .
		    "\u{2}\u{2}\u{2}\u{19}\u{1A}\u{7}\u{E}\u{2}\u{2}\u{1A}\u{1C}\u{5}\u{4}" .
		    "\u{3}\u{5}\u{1B}\u{13}\u{3}\u{2}\u{2}\u{2}\u{1B}\u{15}\u{3}\u{2}\u{2}" .
		    "\u{2}\u{1B}\u{19}\u{3}\u{2}\u{2}\u{2}\u{1C}\u{25}\u{3}\u{2}\u{2}\u{2}" .
		    "\u{1D}\u{1E}\u{C}\u{4}\u{2}\u{2}\u{1E}\u{1F}\u{7}\u{C}\u{2}\u{2}\u{1F}" .
		    "\u{24}\u{5}\u{4}\u{3}\u{5}\u{20}\u{21}\u{C}\u{3}\u{2}\u{2}\u{21}\u{22}" .
		    "\u{7}\u{D}\u{2}\u{2}\u{22}\u{24}\u{5}\u{4}\u{3}\u{4}\u{23}\u{1D}\u{3}" .
		    "\u{2}\u{2}\u{2}\u{23}\u{20}\u{3}\u{2}\u{2}\u{2}\u{24}\u{27}\u{3}\u{2}" .
		    "\u{2}\u{2}\u{25}\u{23}\u{3}\u{2}\u{2}\u{2}\u{25}\u{26}\u{3}\u{2}\u{2}" .
		    "\u{2}\u{26}\u{5}\u{3}\u{2}\u{2}\u{2}\u{27}\u{25}\u{3}\u{2}\u{2}\u{2}" .
		    "\u{28}\u{29}\u{7}\u{13}\u{2}\u{2}\u{29}\u{2A}\u{5}\u{8}\u{5}\u{2}" .
		    "\u{2A}\u{2B}\u{5}\u{A}\u{6}\u{2}\u{2B}\u{7}\u{3}\u{2}\u{2}\u{2}\u{2C}" .
		    "\u{2D}\u{9}\u{2}\u{2}\u{2}\u{2D}\u{9}\u{3}\u{2}\u{2}\u{2}\u{2E}\u{33}" .
		    "\u{7}\u{A}\u{2}\u{2}\u{2F}\u{33}\u{7}\u{B}\u{2}\u{2}\u{30}\u{33}\u{5}" .
		    "\u{C}\u{7}\u{2}\u{31}\u{33}\u{5}\u{E}\u{8}\u{2}\u{32}\u{2E}\u{3}\u{2}" .
		    "\u{2}\u{2}\u{32}\u{2F}\u{3}\u{2}\u{2}\u{2}\u{32}\u{30}\u{3}\u{2}\u{2}" .
		    "\u{2}\u{32}\u{31}\u{3}\u{2}\u{2}\u{2}\u{33}\u{B}\u{3}\u{2}\u{2}\u{2}" .
		    "\u{34}\u{35}\u{7}\u{12}\u{2}\u{2}\u{35}\u{D}\u{3}\u{2}\u{2}\u{2}\u{36}" .
		    "\u{37}\u{7}\u{12}\u{2}\u{2}\u{37}\u{38}\u{7}\u{11}\u{2}\u{2}\u{38}" .
		    "\u{39}\u{7}\u{12}\u{2}\u{2}\u{39}\u{F}\u{3}\u{2}\u{2}\u{2}\u{6}\u{1B}" .
		    "\u{23}\u{25}\u{32}";

		protected static $atn;
		protected static $decisionToDFA;
		protected static $sharedContextCache;

		public function __construct(TokenStream $input)
		{
			parent::__construct($input);

			self::initialize();

			$this->interp = new ParserATNSimulator($this, self::$atn, self::$decisionToDFA, self::$sharedContextCache);
		}

		private static function initialize() : void
		{
			if (self::$atn !== null) {
				return;
			}

			RuntimeMetaData::checkVersion('4.9.2', RuntimeMetaData::VERSION);

			$atn = (new ATNDeserializer())->deserialize(self::SERIALIZED_ATN);

			$decisionToDFA = [];
			for ($i = 0, $count = $atn->getNumberOfDecisions(); $i < $count; $i++) {
				$decisionToDFA[] = new DFA($atn->getDecisionState($i), $i);
			}

			self::$atn = $atn;
			self::$decisionToDFA = $decisionToDFA;
			self::$sharedContextCache = new PredictionContextCache();
		}

		public function getGrammarFileName() : string
		{
			return "ApiFilter.g4";
		}

		public function getRuleNames() : array
		{
			return self::RULE_NAMES;
		}

		public function getSerializedATN() : string
		{
			return self::SERIALIZED_ATN;
		}

		public function getATN() : ATN
		{
			return self::$atn;
		}

		public function getVocabulary() : Vocabulary
        {
            static $vocabulary;

			return $vocabulary = $vocabulary ?? new VocabularyImpl(self::LITERAL_NAMES, self::SYMBOLIC_NAMES);
        }

		/**
		 * @throws RecognitionException
		 */
		public function filter() : Context\FilterContext
		{
		    $localContext = new Context\FilterContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 0, self::RULE_filter);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(14);
		        $this->recursiveExpression(0);
		        $this->setState(15);
		        $this->match(self::EOF);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function expression() : Context\ExpressionContext
		{
			return $this->recursiveExpression(0);
		}

		/**
		 * @throws RecognitionException
		 */
		private function recursiveExpression(int $precedence) : Context\ExpressionContext
		{
			$parentContext = $this->ctx;
			$parentState = $this->getState();
			$localContext = new Context\ExpressionContext($this->ctx, $parentState);
			$previousContext = $localContext;
			$startState = 2;
			$this->enterRecursionRule($localContext, 2, self::RULE_expression, $precedence);

			try {
				$this->enterOuterAlt($localContext, 1);
				$this->setState(25);
				$this->errorHandler->sync($this);

				switch ($this->input->LA(1)) {
				    case self::FIELD:
				    	$localContext = new Context\ConditionExpContext($localContext);
				    	$this->ctx = $localContext;
				    	$previousContext = $localContext;

				    	$this->setState(18);
				    	$this->condition();
				    	break;

				    case self::OPEN_PAR:
				    	$localContext = new Context\ParenthesisExpContext($localContext);
				    	$this->ctx = $localContext;
				    	$previousContext = $localContext;
				    	$this->setState(19);
				    	$this->match(self::OPEN_PAR);
				    	$this->setState(20);
				    	$this->recursiveExpression(0);
				    	$this->setState(21);
				    	$this->match(self::CLOSE_PAR);
				    	break;

				    case self::NOT:
				    	$localContext = new Context\NegationExpContext($localContext);
				    	$this->ctx = $localContext;
				    	$previousContext = $localContext;
				    	$this->setState(23);
				    	$this->match(self::NOT);
				    	$this->setState(24);
				    	$this->recursiveExpression(3);
				    	break;

				default:
					throw new NoViableAltException($this);
				}
				$this->ctx->stop = $this->input->LT(-1);
				$this->setState(35);
				$this->errorHandler->sync($this);

				$alt = $this->getInterpreter()->adaptivePredict($this->input, 2, $this->ctx);

				while ($alt !== 2 && $alt !== ATN::INVALID_ALT_NUMBER) {
					if ($alt === 1) {
						if ($this->getParseListeners() !== null) {
						    $this->triggerExitRuleEvent();
						}

						$previousContext = $localContext;
						$this->setState(33);
						$this->errorHandler->sync($this);

						switch ($this->getInterpreter()->adaptivePredict($this->input, 1, $this->ctx)) {
							case 1:
							    $localContext = new Context\ConjunctionExpContext(new Context\ExpressionContext($parentContext, $parentState));
							    $this->pushNewRecursionContext($localContext, $startState, self::RULE_expression);
							    $this->setState(27);

							    if (!($this->precpred($this->ctx, 2))) {
							        throw new FailedPredicateException($this, "\\\$this->precpred(\\\$this->ctx, 2)");
							    }
							    $this->setState(28);
							    $this->match(self::AND);
							    $this->setState(29);
							    $this->recursiveExpression(3);
							break;

							case 2:
							    $localContext = new Context\DisjunctionExpContext(new Context\ExpressionContext($parentContext, $parentState));
							    $this->pushNewRecursionContext($localContext, $startState, self::RULE_expression);
							    $this->setState(30);

							    if (!($this->precpred($this->ctx, 1))) {
							        throw new FailedPredicateException($this, "\\\$this->precpred(\\\$this->ctx, 1)");
							    }
							    $this->setState(31);
							    $this->match(self::OR);
							    $this->setState(32);
							    $this->recursiveExpression(2);
							break;
						} 
					}

					$this->setState(37);
					$this->errorHandler->sync($this);

					$alt = $this->getInterpreter()->adaptivePredict($this->input, 2, $this->ctx);
				}
			} catch (RecognitionException $exception) {
				$localContext->exception = $exception;
				$this->errorHandler->reportError($this, $exception);
				$this->errorHandler->recover($this, $exception);
			} finally {
				$this->unrollRecursionContexts($parentContext);
			}

			return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function condition() : Context\ConditionContext
		{
		    $localContext = new Context\ConditionContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 4, self::RULE_condition);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(38);
		        $this->match(self::FIELD);
		        $this->setState(39);
		        $this->op();
		        $this->setState(40);
		        $this->value();
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function op() : Context\OpContext
		{
		    $localContext = new Context\OpContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 6, self::RULE_op);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(42);

		        $_la = $this->input->LA(1);

		        if (!(((($_la) & ~0x3f) === 0 && ((1 << $_la) & ((1 << self::EQ) | (1 << self::GT) | (1 << self::GTE) | (1 << self::LT) | (1 << self::LTE) | (1 << self::NEQ) | (1 << self::LIKE))) !== 0))) {
		        $this->errorHandler->recoverInline($this);
		        } else {
		        	if ($this->input->LA(1) === Token::EOF) {
		        	    $this->matchedEOF = true;
		            }

		        	$this->errorHandler->reportMatch($this);
		        	$this->consume();
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function value() : Context\ValueContext
		{
		    $localContext = new Context\ValueContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 8, self::RULE_value);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(48);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 3, $this->ctx)) {
		        	case 1:
		        	    $this->setState(44);
		        	    $this->match(self::BOOL);
		        	break;

		        	case 2:
		        	    $this->setState(45);
		        	    $this->match(self::STRING);
		        	break;

		        	case 3:
		        	    $this->setState(46);
		        	    $this->integer();
		        	break;

		        	case 4:
		        	    $this->setState(47);
		        	    $this->double();
		        	break;
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function integer() : Context\IntegerContext
		{
		    $localContext = new Context\IntegerContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 10, self::RULE_integer);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(50);
		        $this->match(self::INT);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function double() : Context\DoubleContext
		{
		    $localContext = new Context\DoubleContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 12, self::RULE_double);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(52);
		        $this->match(self::INT);
		        $this->setState(53);
		        $this->match(self::DOT);
		        $this->setState(54);
		        $this->match(self::INT);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		public function sempred(?RuleContext $localContext, int $ruleIndex, int $predicateIndex) : bool
		{
			switch ($ruleIndex) {
					case 1:
						return $this->sempredExpression($localContext, $predicateIndex);

				default:
					return true;
				}
		}

		private function sempredExpression(?Context\ExpressionContext $localContext, int $predicateIndex) : bool
		{
			switch ($predicateIndex) {
			    case 0:
			        return $this->precpred($this->ctx, 2);

			    case 1:
			        return $this->precpred($this->ctx, 1);
			}

			return true;
		}
	}
}

namespace FattureInCloud\ApiFilter\Parser\Context {
	use Antlr\Antlr4\Runtime\ParserRuleContext;
	use Antlr\Antlr4\Runtime\Token;
	use Antlr\Antlr4\Runtime\Tree\ParseTreeVisitor;
	use Antlr\Antlr4\Runtime\Tree\TerminalNode;
	use Antlr\Antlr4\Runtime\Tree\ParseTreeListener;
	use FattureInCloud\ApiFilter\Parser\ApiFilterParser;
	use FattureInCloud\ApiFilter\Parser\ApiFilterVisitor;

	class FilterContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return ApiFilterParser::RULE_filter;
	    }

	    public function expression() : ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

	    public function EOF() : ?TerminalNode
	    {
	        return $this->getToken(ApiFilterParser::EOF, 0);
	    }

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof ApiFilterVisitor) {
			    return $visitor->visitFilter($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ExpressionContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return ApiFilterParser::RULE_expression;
	    }
	 
		public function copyFrom(ParserRuleContext $context) : void
		{
			parent::copyFrom($context);

		}
	}

	class NegationExpContext extends ExpressionContext
	{
		public function __construct(ExpressionContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function NOT() : ?TerminalNode
	    {
	        return $this->getToken(ApiFilterParser::NOT, 0);
	    }

	    public function expression() : ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof ApiFilterVisitor) {
			    return $visitor->visitNegationExp($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class ConjunctionExpContext extends ExpressionContext
	{
		public function __construct(ExpressionContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    /**
	     * @return array<ExpressionContext>|ExpressionContext|null
	     */
	    public function expression(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ExpressionContext::class);
	    	}

	        return $this->getTypedRuleContext(ExpressionContext::class, $index);
	    }

	    public function AND() : ?TerminalNode
	    {
	        return $this->getToken(ApiFilterParser::AND, 0);
	    }

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof ApiFilterVisitor) {
			    return $visitor->visitConjunctionExp($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class DisjunctionExpContext extends ExpressionContext
	{
		public function __construct(ExpressionContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    /**
	     * @return array<ExpressionContext>|ExpressionContext|null
	     */
	    public function expression(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ExpressionContext::class);
	    	}

	        return $this->getTypedRuleContext(ExpressionContext::class, $index);
	    }

	    public function OR() : ?TerminalNode
	    {
	        return $this->getToken(ApiFilterParser::OR, 0);
	    }

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof ApiFilterVisitor) {
			    return $visitor->visitDisjunctionExp($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class ConditionExpContext extends ExpressionContext
	{
		public function __construct(ExpressionContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function condition() : ?ConditionContext
	    {
	    	return $this->getTypedRuleContext(ConditionContext::class, 0);
	    }

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof ApiFilterVisitor) {
			    return $visitor->visitConditionExp($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class ParenthesisExpContext extends ExpressionContext
	{
		public function __construct(ExpressionContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function OPEN_PAR() : ?TerminalNode
	    {
	        return $this->getToken(ApiFilterParser::OPEN_PAR, 0);
	    }

	    public function expression() : ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

	    public function CLOSE_PAR() : ?TerminalNode
	    {
	        return $this->getToken(ApiFilterParser::CLOSE_PAR, 0);
	    }

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof ApiFilterVisitor) {
			    return $visitor->visitParenthesisExp($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ConditionContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return ApiFilterParser::RULE_condition;
	    }

	    public function FIELD() : ?TerminalNode
	    {
	        return $this->getToken(ApiFilterParser::FIELD, 0);
	    }

	    public function op() : ?OpContext
	    {
	    	return $this->getTypedRuleContext(OpContext::class, 0);
	    }

	    public function value() : ?ValueContext
	    {
	    	return $this->getTypedRuleContext(ValueContext::class, 0);
	    }

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof ApiFilterVisitor) {
			    return $visitor->visitCondition($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class OpContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return ApiFilterParser::RULE_op;
	    }

	    public function EQ() : ?TerminalNode
	    {
	        return $this->getToken(ApiFilterParser::EQ, 0);
	    }

	    public function GT() : ?TerminalNode
	    {
	        return $this->getToken(ApiFilterParser::GT, 0);
	    }

	    public function GTE() : ?TerminalNode
	    {
	        return $this->getToken(ApiFilterParser::GTE, 0);
	    }

	    public function LT() : ?TerminalNode
	    {
	        return $this->getToken(ApiFilterParser::LT, 0);
	    }

	    public function LTE() : ?TerminalNode
	    {
	        return $this->getToken(ApiFilterParser::LTE, 0);
	    }

	    public function NEQ() : ?TerminalNode
	    {
	        return $this->getToken(ApiFilterParser::NEQ, 0);
	    }

	    public function LIKE() : ?TerminalNode
	    {
	        return $this->getToken(ApiFilterParser::LIKE, 0);
	    }

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof ApiFilterVisitor) {
			    return $visitor->visitOp($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ValueContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return ApiFilterParser::RULE_value;
	    }

	    public function BOOL() : ?TerminalNode
	    {
	        return $this->getToken(ApiFilterParser::BOOL, 0);
	    }

	    public function STRING() : ?TerminalNode
	    {
	        return $this->getToken(ApiFilterParser::STRING, 0);
	    }

	    public function integer() : ?IntegerContext
	    {
	    	return $this->getTypedRuleContext(IntegerContext::class, 0);
	    }

	    public function double() : ?DoubleContext
	    {
	    	return $this->getTypedRuleContext(DoubleContext::class, 0);
	    }

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof ApiFilterVisitor) {
			    return $visitor->visitValue($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class IntegerContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return ApiFilterParser::RULE_integer;
	    }

	    public function INT() : ?TerminalNode
	    {
	        return $this->getToken(ApiFilterParser::INT, 0);
	    }

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof ApiFilterVisitor) {
			    return $visitor->visitInteger($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class DoubleContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return ApiFilterParser::RULE_double;
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function INT(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(ApiFilterParser::INT);
	    	}

	        return $this->getToken(ApiFilterParser::INT, $index);
	    }

	    public function DOT() : ?TerminalNode
	    {
	        return $this->getToken(ApiFilterParser::DOT, 0);
	    }

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof ApiFilterVisitor) {
			    return $visitor->visitDouble($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 
}