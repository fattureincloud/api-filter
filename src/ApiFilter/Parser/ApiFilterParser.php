<?php

/*
 * Generated from ./grammar/ApiFilter.g4 by ANTLR 4.13.2
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
               CONTAINS = 8, STARTSWITH = 9, ENDSWITH = 10, STARTS = 11, 
               ENDS = 12, WITH = 13, BOOL = 14, STRING = 15, AND = 16, OR = 17, 
               IS = 18, NULL = 19, NOT = 20, OPEN_PAR = 21, CLOSE_PAR = 22, 
               INT = 23, DOT = 24, FIELD = 25, WS = 26;

		public const RULE_filter = 0, RULE_expression = 1, RULE_condition = 2, 
               RULE_comparison = 3, RULE_emptyfield = 4, RULE_filledfield = 5, 
               RULE_comparisonop = 6, RULE_value = 7, RULE_pattern = 8, 
               RULE_patternop = 9, RULE_integer = 10, RULE_decimal = 11;

		/**
		 * @var array<string>
		 */
		public const RULE_NAMES = [
			'filter', 'expression', 'condition', 'comparison', 'emptyfield', 'filledfield', 
			'comparisonop', 'value', 'pattern', 'patternop', 'integer', 'decimal'
		];

		/**
		 * @var array<string|null>
		 */
		private const LITERAL_NAMES = [
		    null, "'='", "'>'", "'>='", "'<'", "'<='", null, null, null, null, 
		    null, null, null, null, null, null, null, null, null, null, null, 
		    "'('", "')'", null, "'.'"
		];

		/**
		 * @var array<string>
		 */
		private const SYMBOLIC_NAMES = [
		    null, "EQ", "GT", "GTE", "LT", "LTE", "NEQ", "LIKE", "CONTAINS", "STARTSWITH", 
		    "ENDSWITH", "STARTS", "ENDS", "WITH", "BOOL", "STRING", "AND", "OR", 
		    "IS", "NULL", "NOT", "OPEN_PAR", "CLOSE_PAR", "INT", "DOT", "FIELD", 
		    "WS"
		];

		private const SERIALIZED_ATN =
			[4, 1, 26, 97, 2, 0, 7, 0, 2, 1, 7, 1, 2, 2, 7, 2, 2, 3, 7, 3, 2, 4, 
		    7, 4, 2, 5, 7, 5, 2, 6, 7, 6, 2, 7, 7, 7, 2, 8, 7, 8, 2, 9, 7, 9, 
		    2, 10, 7, 10, 2, 11, 7, 11, 1, 0, 1, 0, 1, 0, 1, 1, 1, 1, 1, 1, 1, 
		    1, 1, 1, 1, 1, 1, 1, 3, 1, 35, 8, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 
		    1, 1, 5, 1, 43, 8, 1, 10, 1, 12, 1, 46, 9, 1, 1, 2, 1, 2, 1, 2, 3, 
		    2, 51, 8, 2, 1, 3, 1, 3, 1, 3, 1, 3, 1, 4, 1, 4, 1, 4, 1, 4, 1, 5, 
		    1, 5, 1, 5, 1, 5, 3, 5, 65, 8, 5, 1, 5, 1, 5, 1, 6, 1, 6, 1, 7, 1, 
		    7, 1, 7, 1, 7, 3, 7, 75, 8, 7, 1, 8, 1, 8, 1, 8, 1, 8, 1, 9, 1, 9, 
		    1, 9, 1, 9, 1, 9, 1, 9, 1, 9, 1, 9, 3, 9, 89, 8, 9, 1, 10, 1, 10, 
		    1, 11, 1, 11, 1, 11, 1, 11, 1, 11, 0, 1, 2, 12, 0, 2, 4, 6, 8, 10, 
		    12, 14, 16, 18, 20, 22, 0, 2, 2, 0, 1, 1, 18, 18, 1, 0, 1, 6, 99, 
		    0, 24, 1, 0, 0, 0, 2, 34, 1, 0, 0, 0, 4, 50, 1, 0, 0, 0, 6, 52, 1, 
		    0, 0, 0, 8, 56, 1, 0, 0, 0, 10, 60, 1, 0, 0, 0, 12, 68, 1, 0, 0, 0, 
		    14, 74, 1, 0, 0, 0, 16, 76, 1, 0, 0, 0, 18, 88, 1, 0, 0, 0, 20, 90, 
		    1, 0, 0, 0, 22, 92, 1, 0, 0, 0, 24, 25, 3, 2, 1, 0, 25, 26, 5, 0, 
		    0, 1, 26, 1, 1, 0, 0, 0, 27, 28, 6, 1, -1, 0, 28, 35, 3, 4, 2, 0, 
		    29, 35, 3, 16, 8, 0, 30, 31, 5, 21, 0, 0, 31, 32, 3, 2, 1, 0, 32, 
		    33, 5, 22, 0, 0, 33, 35, 1, 0, 0, 0, 34, 27, 1, 0, 0, 0, 34, 29, 1, 
		    0, 0, 0, 34, 30, 1, 0, 0, 0, 35, 44, 1, 0, 0, 0, 36, 37, 10, 2, 0, 
		    0, 37, 38, 5, 16, 0, 0, 38, 43, 3, 2, 1, 3, 39, 40, 10, 1, 0, 0, 40, 
		    41, 5, 17, 0, 0, 41, 43, 3, 2, 1, 2, 42, 36, 1, 0, 0, 0, 42, 39, 1, 
		    0, 0, 0, 43, 46, 1, 0, 0, 0, 44, 42, 1, 0, 0, 0, 44, 45, 1, 0, 0, 
		    0, 45, 3, 1, 0, 0, 0, 46, 44, 1, 0, 0, 0, 47, 51, 3, 6, 3, 0, 48, 
		    51, 3, 8, 4, 0, 49, 51, 3, 10, 5, 0, 50, 47, 1, 0, 0, 0, 50, 48, 1, 
		    0, 0, 0, 50, 49, 1, 0, 0, 0, 51, 5, 1, 0, 0, 0, 52, 53, 5, 25, 0, 
		    0, 53, 54, 3, 12, 6, 0, 54, 55, 3, 14, 7, 0, 55, 7, 1, 0, 0, 0, 56, 
		    57, 5, 25, 0, 0, 57, 58, 7, 0, 0, 0, 58, 59, 5, 19, 0, 0, 59, 9, 1, 
		    0, 0, 0, 60, 64, 5, 25, 0, 0, 61, 65, 5, 6, 0, 0, 62, 63, 5, 18, 0, 
		    0, 63, 65, 5, 20, 0, 0, 64, 61, 1, 0, 0, 0, 64, 62, 1, 0, 0, 0, 65, 
		    66, 1, 0, 0, 0, 66, 67, 5, 19, 0, 0, 67, 11, 1, 0, 0, 0, 68, 69, 7, 
		    1, 0, 0, 69, 13, 1, 0, 0, 0, 70, 75, 5, 14, 0, 0, 71, 75, 5, 15, 0, 
		    0, 72, 75, 3, 20, 10, 0, 73, 75, 3, 22, 11, 0, 74, 70, 1, 0, 0, 0, 
		    74, 71, 1, 0, 0, 0, 74, 72, 1, 0, 0, 0, 74, 73, 1, 0, 0, 0, 75, 15, 
		    1, 0, 0, 0, 76, 77, 5, 25, 0, 0, 77, 78, 3, 18, 9, 0, 78, 79, 5, 15, 
		    0, 0, 79, 17, 1, 0, 0, 0, 80, 89, 5, 7, 0, 0, 81, 89, 5, 8, 0, 0, 
		    82, 83, 5, 20, 0, 0, 83, 89, 5, 7, 0, 0, 84, 85, 5, 20, 0, 0, 85, 
		    89, 5, 8, 0, 0, 86, 89, 5, 9, 0, 0, 87, 89, 5, 10, 0, 0, 88, 80, 1, 
		    0, 0, 0, 88, 81, 1, 0, 0, 0, 88, 82, 1, 0, 0, 0, 88, 84, 1, 0, 0, 
		    0, 88, 86, 1, 0, 0, 0, 88, 87, 1, 0, 0, 0, 89, 19, 1, 0, 0, 0, 90, 
		    91, 5, 23, 0, 0, 91, 21, 1, 0, 0, 0, 92, 93, 5, 23, 0, 0, 93, 94, 
		    5, 24, 0, 0, 94, 95, 5, 23, 0, 0, 95, 23, 1, 0, 0, 0, 7, 34, 42, 44, 
		    50, 64, 74, 88];
		protected static $atn;
		protected static $decisionToDFA;
		protected static $sharedContextCache;

		public function __construct(TokenStream $input)
		{
			parent::__construct($input);

			self::initialize();

			$this->interp = new ParserATNSimulator($this, self::$atn, self::$decisionToDFA, self::$sharedContextCache);
		}

		private static function initialize(): void
		{
			if (self::$atn !== null) {
				return;
			}

			RuntimeMetaData::checkVersion('4.13.2', RuntimeMetaData::VERSION);

			$atn = (new ATNDeserializer())->deserialize(self::SERIALIZED_ATN);

			$decisionToDFA = [];
			for ($i = 0, $count = $atn->getNumberOfDecisions(); $i < $count; $i++) {
				$decisionToDFA[] = new DFA($atn->getDecisionState($i), $i);
			}

			self::$atn = $atn;
			self::$decisionToDFA = $decisionToDFA;
			self::$sharedContextCache = new PredictionContextCache();
		}

		public function getGrammarFileName(): string
		{
			return "ApiFilter.g4";
		}

		public function getRuleNames(): array
		{
			return self::RULE_NAMES;
		}

		public function getSerializedATN(): array
		{
			return self::SERIALIZED_ATN;
		}

		public function getATN(): ATN
		{
			return self::$atn;
		}

		public function getVocabulary(): Vocabulary
        {
            static $vocabulary;

			return $vocabulary = $vocabulary ?? new VocabularyImpl(self::LITERAL_NAMES, self::SYMBOLIC_NAMES);
        }

		/**
		 * @throws RecognitionException
		 */
		public function filter(): Context\FilterContext
		{
		    $localContext = new Context\FilterContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 0, self::RULE_filter);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(24);
		        $this->recursiveExpression(0);
		        $this->setState(25);
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
		public function expression(): Context\ExpressionContext
		{
			return $this->recursiveExpression(0);
		}

		/**
		 * @throws RecognitionException
		 */
		private function recursiveExpression(int $precedence): Context\ExpressionContext
		{
			$parentContext = $this->ctx;
			$parentState = $this->getState();
			$localContext = new Context\ExpressionContext($this->ctx, $parentState);
			$previousContext = $localContext;
			$startState = 2;
			$this->enterRecursionRule($localContext, 2, self::RULE_expression, $precedence);

			try {
				$this->enterOuterAlt($localContext, 1);
				$this->setState(34);
				$this->errorHandler->sync($this);

				switch ($this->getInterpreter()->adaptivePredict($this->input, 0, $this->ctx)) {
					case 1:
					    $localContext = new Context\ConditionExpContext($localContext);
					    $this->ctx = $localContext;
					    $previousContext = $localContext;

					    $this->setState(28);
					    $this->condition();
					break;

					case 2:
					    $localContext = new Context\PatternExpContext($localContext);
					    $this->ctx = $localContext;
					    $previousContext = $localContext;
					    $this->setState(29);
					    $this->pattern();
					break;

					case 3:
					    $localContext = new Context\ParenthesisExpContext($localContext);
					    $this->ctx = $localContext;
					    $previousContext = $localContext;
					    $this->setState(30);
					    $this->match(self::OPEN_PAR);
					    $this->setState(31);
					    $this->recursiveExpression(0);
					    $this->setState(32);
					    $this->match(self::CLOSE_PAR);
					break;
				}
				$this->ctx->stop = $this->input->LT(-1);
				$this->setState(44);
				$this->errorHandler->sync($this);

				$alt = $this->getInterpreter()->adaptivePredict($this->input, 2, $this->ctx);

				while ($alt !== 2 && $alt !== ATN::INVALID_ALT_NUMBER) {
					if ($alt === 1) {
						if ($this->getParseListeners() !== null) {
						    $this->triggerExitRuleEvent();
						}

						$previousContext = $localContext;
						$this->setState(42);
						$this->errorHandler->sync($this);

						switch ($this->getInterpreter()->adaptivePredict($this->input, 1, $this->ctx)) {
							case 1:
							    $localContext = new Context\ConjunctionExpContext(new Context\ExpressionContext($parentContext, $parentState));
							    $this->pushNewRecursionContext($localContext, $startState, self::RULE_expression);
							    $this->setState(36);

							    if (!($this->precpred($this->ctx, 2))) {
							        throw new FailedPredicateException($this, "\\\$this->precpred(\\\$this->ctx, 2)");
							    }
							    $this->setState(37);
							    $this->match(self::AND);
							    $this->setState(38);
							    $this->recursiveExpression(3);
							break;

							case 2:
							    $localContext = new Context\DisjunctionExpContext(new Context\ExpressionContext($parentContext, $parentState));
							    $this->pushNewRecursionContext($localContext, $startState, self::RULE_expression);
							    $this->setState(39);

							    if (!($this->precpred($this->ctx, 1))) {
							        throw new FailedPredicateException($this, "\\\$this->precpred(\\\$this->ctx, 1)");
							    }
							    $this->setState(40);
							    $this->match(self::OR);
							    $this->setState(41);
							    $this->recursiveExpression(2);
							break;
						} 
					}

					$this->setState(46);
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
		public function condition(): Context\ConditionContext
		{
		    $localContext = new Context\ConditionContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 4, self::RULE_condition);

		    try {
		        $this->setState(50);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 3, $this->ctx)) {
		        	case 1:
		        	    $localContext = new Context\ComparisonConditionContext($localContext);
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(47);
		        	    $this->comparison();
		        	break;

		        	case 2:
		        	    $localContext = new Context\EmptyConditionContext($localContext);
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(48);
		        	    $this->emptyfield();
		        	break;

		        	case 3:
		        	    $localContext = new Context\FilledConditionContext($localContext);
		        	    $this->enterOuterAlt($localContext, 3);
		        	    $this->setState(49);
		        	    $this->filledfield();
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
		public function comparison(): Context\ComparisonContext
		{
		    $localContext = new Context\ComparisonContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 6, self::RULE_comparison);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(52);
		        $this->match(self::FIELD);
		        $this->setState(53);
		        $this->comparisonop();
		        $this->setState(54);
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
		public function emptyfield(): Context\EmptyfieldContext
		{
		    $localContext = new Context\EmptyfieldContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 8, self::RULE_emptyfield);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(56);
		        $this->match(self::FIELD);
		        $this->setState(57);

		        $_la = $this->input->LA(1);

		        if (!($_la === self::EQ || $_la === self::IS)) {
		        $this->errorHandler->recoverInline($this);
		        } else {
		        	if ($this->input->LA(1) === Token::EOF) {
		        	    $this->matchedEOF = true;
		            }

		        	$this->errorHandler->reportMatch($this);
		        	$this->consume();
		        }
		        $this->setState(58);
		        $this->match(self::NULL);
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
		public function filledfield(): Context\FilledfieldContext
		{
		    $localContext = new Context\FilledfieldContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 10, self::RULE_filledfield);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(60);
		        $this->match(self::FIELD);
		        $this->setState(64);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::NEQ:
		            	$this->setState(61);
		            	$this->match(self::NEQ);
		            	break;

		            case self::IS:
		            	$this->setState(62);
		            	$this->match(self::IS);
		            	$this->setState(63);
		            	$this->match(self::NOT);
		            	break;

		        default:
		        	throw new NoViableAltException($this);
		        }
		        $this->setState(66);
		        $this->match(self::NULL);
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
		public function comparisonop(): Context\ComparisonopContext
		{
		    $localContext = new Context\ComparisonopContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 12, self::RULE_comparisonop);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(68);

		        $_la = $this->input->LA(1);

		        if (!(((($_la) & ~0x3f) === 0 && ((1 << $_la) & 126) !== 0))) {
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
		public function value(): Context\ValueContext
		{
		    $localContext = new Context\ValueContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 14, self::RULE_value);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(74);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 5, $this->ctx)) {
		        	case 1:
		        	    $this->setState(70);
		        	    $this->match(self::BOOL);
		        	break;

		        	case 2:
		        	    $this->setState(71);
		        	    $this->match(self::STRING);
		        	break;

		        	case 3:
		        	    $this->setState(72);
		        	    $this->integer();
		        	break;

		        	case 4:
		        	    $this->setState(73);
		        	    $this->decimal();
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
		public function pattern(): Context\PatternContext
		{
		    $localContext = new Context\PatternContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 16, self::RULE_pattern);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(76);
		        $this->match(self::FIELD);
		        $this->setState(77);
		        $this->patternop();
		        $this->setState(78);
		        $this->match(self::STRING);
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
		public function patternop(): Context\PatternopContext
		{
		    $localContext = new Context\PatternopContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 18, self::RULE_patternop);

		    try {
		        $this->setState(88);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 6, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(80);
		        	    $this->match(self::LIKE);
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(81);
		        	    $this->match(self::CONTAINS);
		        	break;

		        	case 3:
		        	    $this->enterOuterAlt($localContext, 3);
		        	    $this->setState(82);
		        	    $this->match(self::NOT);
		        	    $this->setState(83);
		        	    $this->match(self::LIKE);
		        	break;

		        	case 4:
		        	    $this->enterOuterAlt($localContext, 4);
		        	    $this->setState(84);
		        	    $this->match(self::NOT);
		        	    $this->setState(85);
		        	    $this->match(self::CONTAINS);
		        	break;

		        	case 5:
		        	    $this->enterOuterAlt($localContext, 5);
		        	    $this->setState(86);
		        	    $this->match(self::STARTSWITH);
		        	break;

		        	case 6:
		        	    $this->enterOuterAlt($localContext, 6);
		        	    $this->setState(87);
		        	    $this->match(self::ENDSWITH);
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
		public function integer(): Context\IntegerContext
		{
		    $localContext = new Context\IntegerContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 20, self::RULE_integer);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(90);
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
		public function decimal(): Context\DecimalContext
		{
		    $localContext = new Context\DecimalContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 22, self::RULE_decimal);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(92);
		        $this->match(self::INT);
		        $this->setState(93);
		        $this->match(self::DOT);
		        $this->setState(94);
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

		public function sempred(?RuleContext $localContext, int $ruleIndex, int $predicateIndex): bool
		{
			switch ($ruleIndex) {
					case 1:
						return $this->sempredExpression($localContext, $predicateIndex);

				default:
					return true;
				}
		}

		private function sempredExpression(?Context\ExpressionContext $localContext, int $predicateIndex): bool
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

		public function getRuleIndex(): int
		{
		    return ApiFilterParser::RULE_filter;
	    }

	    public function expression(): ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

	    public function EOF(): ?TerminalNode
	    {
	        return $this->getToken(ApiFilterParser::EOF, 0);
	    }

		public function accept(ParseTreeVisitor $visitor): mixed
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

		public function getRuleIndex(): int
		{
		    return ApiFilterParser::RULE_expression;
	    }
	 
		public function copyFrom(ParserRuleContext $context): void
		{
			parent::copyFrom($context);

		}
	}

	class PatternExpContext extends ExpressionContext
	{
		public function __construct(ExpressionContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function pattern(): ?PatternContext
	    {
	    	return $this->getTypedRuleContext(PatternContext::class, 0);
	    }

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof ApiFilterVisitor) {
			    return $visitor->visitPatternExp($this);
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

	    public function AND(): ?TerminalNode
	    {
	        return $this->getToken(ApiFilterParser::AND, 0);
	    }

		public function accept(ParseTreeVisitor $visitor): mixed
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

	    public function OR(): ?TerminalNode
	    {
	        return $this->getToken(ApiFilterParser::OR, 0);
	    }

		public function accept(ParseTreeVisitor $visitor): mixed
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

	    public function condition(): ?ConditionContext
	    {
	    	return $this->getTypedRuleContext(ConditionContext::class, 0);
	    }

		public function accept(ParseTreeVisitor $visitor): mixed
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

	    public function OPEN_PAR(): ?TerminalNode
	    {
	        return $this->getToken(ApiFilterParser::OPEN_PAR, 0);
	    }

	    public function expression(): ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

	    public function CLOSE_PAR(): ?TerminalNode
	    {
	        return $this->getToken(ApiFilterParser::CLOSE_PAR, 0);
	    }

		public function accept(ParseTreeVisitor $visitor): mixed
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

		public function getRuleIndex(): int
		{
		    return ApiFilterParser::RULE_condition;
	    }
	 
		public function copyFrom(ParserRuleContext $context): void
		{
			parent::copyFrom($context);

		}
	}

	class EmptyConditionContext extends ConditionContext
	{
		public function __construct(ConditionContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function emptyfield(): ?EmptyfieldContext
	    {
	    	return $this->getTypedRuleContext(EmptyfieldContext::class, 0);
	    }

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof ApiFilterVisitor) {
			    return $visitor->visitEmptyCondition($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class FilledConditionContext extends ConditionContext
	{
		public function __construct(ConditionContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function filledfield(): ?FilledfieldContext
	    {
	    	return $this->getTypedRuleContext(FilledfieldContext::class, 0);
	    }

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof ApiFilterVisitor) {
			    return $visitor->visitFilledCondition($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class ComparisonConditionContext extends ConditionContext
	{
		public function __construct(ConditionContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function comparison(): ?ComparisonContext
	    {
	    	return $this->getTypedRuleContext(ComparisonContext::class, 0);
	    }

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof ApiFilterVisitor) {
			    return $visitor->visitComparisonCondition($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ComparisonContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return ApiFilterParser::RULE_comparison;
	    }

	    public function FIELD(): ?TerminalNode
	    {
	        return $this->getToken(ApiFilterParser::FIELD, 0);
	    }

	    public function comparisonop(): ?ComparisonopContext
	    {
	    	return $this->getTypedRuleContext(ComparisonopContext::class, 0);
	    }

	    public function value(): ?ValueContext
	    {
	    	return $this->getTypedRuleContext(ValueContext::class, 0);
	    }

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof ApiFilterVisitor) {
			    return $visitor->visitComparison($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class EmptyfieldContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return ApiFilterParser::RULE_emptyfield;
	    }

	    public function FIELD(): ?TerminalNode
	    {
	        return $this->getToken(ApiFilterParser::FIELD, 0);
	    }

	    public function NULL(): ?TerminalNode
	    {
	        return $this->getToken(ApiFilterParser::NULL, 0);
	    }

	    public function EQ(): ?TerminalNode
	    {
	        return $this->getToken(ApiFilterParser::EQ, 0);
	    }

	    public function IS(): ?TerminalNode
	    {
	        return $this->getToken(ApiFilterParser::IS, 0);
	    }

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof ApiFilterVisitor) {
			    return $visitor->visitEmptyfield($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class FilledfieldContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return ApiFilterParser::RULE_filledfield;
	    }

	    public function FIELD(): ?TerminalNode
	    {
	        return $this->getToken(ApiFilterParser::FIELD, 0);
	    }

	    public function NULL(): ?TerminalNode
	    {
	        return $this->getToken(ApiFilterParser::NULL, 0);
	    }

	    public function NEQ(): ?TerminalNode
	    {
	        return $this->getToken(ApiFilterParser::NEQ, 0);
	    }

	    public function IS(): ?TerminalNode
	    {
	        return $this->getToken(ApiFilterParser::IS, 0);
	    }

	    public function NOT(): ?TerminalNode
	    {
	        return $this->getToken(ApiFilterParser::NOT, 0);
	    }

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof ApiFilterVisitor) {
			    return $visitor->visitFilledfield($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ComparisonopContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return ApiFilterParser::RULE_comparisonop;
	    }

	    public function EQ(): ?TerminalNode
	    {
	        return $this->getToken(ApiFilterParser::EQ, 0);
	    }

	    public function GT(): ?TerminalNode
	    {
	        return $this->getToken(ApiFilterParser::GT, 0);
	    }

	    public function GTE(): ?TerminalNode
	    {
	        return $this->getToken(ApiFilterParser::GTE, 0);
	    }

	    public function LT(): ?TerminalNode
	    {
	        return $this->getToken(ApiFilterParser::LT, 0);
	    }

	    public function LTE(): ?TerminalNode
	    {
	        return $this->getToken(ApiFilterParser::LTE, 0);
	    }

	    public function NEQ(): ?TerminalNode
	    {
	        return $this->getToken(ApiFilterParser::NEQ, 0);
	    }

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof ApiFilterVisitor) {
			    return $visitor->visitComparisonop($this);
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

		public function getRuleIndex(): int
		{
		    return ApiFilterParser::RULE_value;
	    }

	    public function BOOL(): ?TerminalNode
	    {
	        return $this->getToken(ApiFilterParser::BOOL, 0);
	    }

	    public function STRING(): ?TerminalNode
	    {
	        return $this->getToken(ApiFilterParser::STRING, 0);
	    }

	    public function integer(): ?IntegerContext
	    {
	    	return $this->getTypedRuleContext(IntegerContext::class, 0);
	    }

	    public function decimal(): ?DecimalContext
	    {
	    	return $this->getTypedRuleContext(DecimalContext::class, 0);
	    }

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof ApiFilterVisitor) {
			    return $visitor->visitValue($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class PatternContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return ApiFilterParser::RULE_pattern;
	    }

	    public function FIELD(): ?TerminalNode
	    {
	        return $this->getToken(ApiFilterParser::FIELD, 0);
	    }

	    public function patternop(): ?PatternopContext
	    {
	    	return $this->getTypedRuleContext(PatternopContext::class, 0);
	    }

	    public function STRING(): ?TerminalNode
	    {
	        return $this->getToken(ApiFilterParser::STRING, 0);
	    }

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof ApiFilterVisitor) {
			    return $visitor->visitPattern($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class PatternopContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return ApiFilterParser::RULE_patternop;
	    }

	    public function LIKE(): ?TerminalNode
	    {
	        return $this->getToken(ApiFilterParser::LIKE, 0);
	    }

	    public function CONTAINS(): ?TerminalNode
	    {
	        return $this->getToken(ApiFilterParser::CONTAINS, 0);
	    }

	    public function NOT(): ?TerminalNode
	    {
	        return $this->getToken(ApiFilterParser::NOT, 0);
	    }

	    public function STARTSWITH(): ?TerminalNode
	    {
	        return $this->getToken(ApiFilterParser::STARTSWITH, 0);
	    }

	    public function ENDSWITH(): ?TerminalNode
	    {
	        return $this->getToken(ApiFilterParser::ENDSWITH, 0);
	    }

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof ApiFilterVisitor) {
			    return $visitor->visitPatternop($this);
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

		public function getRuleIndex(): int
		{
		    return ApiFilterParser::RULE_integer;
	    }

	    public function INT(): ?TerminalNode
	    {
	        return $this->getToken(ApiFilterParser::INT, 0);
	    }

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof ApiFilterVisitor) {
			    return $visitor->visitInteger($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class DecimalContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return ApiFilterParser::RULE_decimal;
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

	    public function DOT(): ?TerminalNode
	    {
	        return $this->getToken(ApiFilterParser::DOT, 0);
	    }

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof ApiFilterVisitor) {
			    return $visitor->visitDecimal($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 
}