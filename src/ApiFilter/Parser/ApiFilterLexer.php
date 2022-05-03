<?php

/*
 * Generated from /grammar/ApiFilter.g4 by ANTLR 4.10.1
 */

namespace FattureInCloud\ApiFilter\Parser {
	use Antlr\Antlr4\Runtime\Atn\ATNDeserializer;
	use Antlr\Antlr4\Runtime\Atn\LexerATNSimulator;
	use Antlr\Antlr4\Runtime\Lexer;
	use Antlr\Antlr4\Runtime\CharStream;
	use Antlr\Antlr4\Runtime\PredictionContexts\PredictionContextCache;
	use Antlr\Antlr4\Runtime\RuleContext;
	use Antlr\Antlr4\Runtime\Atn\ATN;
	use Antlr\Antlr4\Runtime\Dfa\DFA;
	use Antlr\Antlr4\Runtime\Vocabulary;
	use Antlr\Antlr4\Runtime\RuntimeMetaData;
	use Antlr\Antlr4\Runtime\VocabularyImpl;

	final class ApiFilterLexer extends Lexer
	{
		public const EQ = 1, GT = 2, GTE = 3, LT = 4, LTE = 5, NEQ = 6, LIKE = 7, 
               CONTAINS = 8, STARTSWITH = 9, ENDSWITH = 10, STARTS = 11, 
               ENDS = 12, WITH = 13, BOOL = 14, STRING = 15, AND = 16, OR = 17, 
               IS = 18, NULL = 19, NOT = 20, OPEN_PAR = 21, CLOSE_PAR = 22, 
               INT = 23, DOT = 24, FIELD = 25, WS = 26;

		/**
		 * @var array<string>
		 */
		public const CHANNEL_NAMES = [
			'DEFAULT_TOKEN_CHANNEL', 'HIDDEN'
		];

		/**
		 * @var array<string>
		 */
		public const MODE_NAMES = [
			'DEFAULT_MODE'
		];

		/**
		 * @var array<string>
		 */
		public const RULE_NAMES = [
			'EQ', 'GT', 'GTE', 'LT', 'LTE', 'NEQ', 'LIKE', 'CONTAINS', 'STARTSWITH', 
			'ENDSWITH', 'STARTS', 'ENDS', 'WITH', 'BOOL', 'STRING', 'AND', 'OR', 
			'IS', 'NULL', 'NOT', 'OPEN_PAR', 'CLOSE_PAR', 'INT', 'DOT', 'FIELD', 
			'LOWERCASE', 'UPPERCASE', 'DIGIT', 'WS'
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
			[4, 0, 26, 252, 6, -1, 2, 0, 7, 0, 2, 1, 7, 1, 2, 2, 7, 2, 2, 3, 7, 3, 
		    2, 4, 7, 4, 2, 5, 7, 5, 2, 6, 7, 6, 2, 7, 7, 7, 2, 8, 7, 8, 2, 9, 
		    7, 9, 2, 10, 7, 10, 2, 11, 7, 11, 2, 12, 7, 12, 2, 13, 7, 13, 2, 14, 
		    7, 14, 2, 15, 7, 15, 2, 16, 7, 16, 2, 17, 7, 17, 2, 18, 7, 18, 2, 
		    19, 7, 19, 2, 20, 7, 20, 2, 21, 7, 21, 2, 22, 7, 22, 2, 23, 7, 23, 
		    2, 24, 7, 24, 2, 25, 7, 25, 2, 26, 7, 26, 2, 27, 7, 27, 2, 28, 7, 
		    28, 1, 0, 1, 0, 1, 1, 1, 1, 1, 2, 1, 2, 1, 2, 1, 3, 1, 3, 1, 4, 1, 
		    4, 1, 4, 1, 5, 1, 5, 1, 5, 1, 5, 3, 5, 76, 8, 5, 1, 6, 1, 6, 1, 6, 
		    1, 6, 1, 6, 1, 6, 1, 6, 1, 6, 3, 6, 86, 8, 6, 1, 7, 1, 7, 1, 7, 1, 
		    7, 1, 7, 1, 7, 1, 7, 1, 7, 1, 7, 1, 7, 1, 7, 1, 7, 1, 7, 1, 7, 1, 
		    7, 1, 7, 3, 7, 104, 8, 7, 1, 8, 1, 8, 5, 8, 108, 8, 8, 10, 8, 12, 
		    8, 111, 9, 8, 1, 8, 1, 8, 1, 9, 1, 9, 5, 9, 117, 8, 9, 10, 9, 12, 
		    9, 120, 9, 9, 1, 9, 1, 9, 1, 10, 1, 10, 1, 10, 1, 10, 1, 10, 1, 10, 
		    1, 10, 1, 10, 1, 10, 1, 10, 1, 10, 1, 10, 3, 10, 136, 8, 10, 1, 11, 
		    1, 11, 1, 11, 1, 11, 1, 11, 1, 11, 1, 11, 1, 11, 3, 11, 146, 8, 11, 
		    1, 12, 1, 12, 1, 12, 1, 12, 1, 12, 1, 12, 1, 12, 1, 12, 3, 12, 156, 
		    8, 12, 1, 13, 1, 13, 1, 13, 1, 13, 1, 13, 1, 13, 1, 13, 1, 13, 1, 
		    13, 3, 13, 167, 8, 13, 1, 14, 1, 14, 1, 14, 1, 14, 4, 14, 173, 8, 
		    14, 11, 14, 12, 14, 174, 1, 14, 1, 14, 1, 15, 1, 15, 1, 15, 1, 15, 
		    1, 15, 1, 15, 3, 15, 185, 8, 15, 1, 16, 1, 16, 1, 16, 1, 16, 3, 16, 
		    191, 8, 16, 1, 17, 1, 17, 1, 17, 1, 17, 3, 17, 197, 8, 17, 1, 18, 
		    1, 18, 1, 18, 1, 18, 1, 18, 1, 18, 1, 18, 1, 18, 3, 18, 207, 8, 18, 
		    1, 19, 1, 19, 1, 19, 1, 19, 1, 19, 1, 19, 3, 19, 215, 8, 19, 1, 20, 
		    1, 20, 1, 21, 1, 21, 1, 22, 4, 22, 222, 8, 22, 11, 22, 12, 22, 223, 
		    1, 23, 1, 23, 1, 24, 1, 24, 1, 24, 1, 24, 5, 24, 232, 8, 24, 10, 24, 
		    12, 24, 235, 9, 24, 1, 24, 3, 24, 238, 8, 24, 1, 25, 1, 25, 1, 26, 
		    1, 26, 1, 27, 1, 27, 1, 28, 4, 28, 247, 8, 28, 11, 28, 12, 28, 248, 
		    1, 28, 1, 28, 0, 0, 29, 1, 1, 3, 2, 5, 3, 7, 4, 9, 5, 11, 6, 13, 7, 
		    15, 8, 17, 9, 19, 10, 21, 11, 23, 12, 25, 13, 27, 14, 29, 15, 31, 
		    16, 33, 17, 35, 18, 37, 19, 39, 20, 41, 21, 43, 22, 45, 23, 47, 24, 
		    49, 25, 51, 0, 53, 0, 55, 0, 57, 26, 1, 0, 5, 1, 0, 39, 39, 1, 0, 
		    97, 122, 1, 0, 65, 90, 1, 0, 48, 57, 3, 0, 9, 10, 13, 13, 32, 32, 
		    270, 0, 1, 1, 0, 0, 0, 0, 3, 1, 0, 0, 0, 0, 5, 1, 0, 0, 0, 0, 7, 1, 
		    0, 0, 0, 0, 9, 1, 0, 0, 0, 0, 11, 1, 0, 0, 0, 0, 13, 1, 0, 0, 0, 0, 
		    15, 1, 0, 0, 0, 0, 17, 1, 0, 0, 0, 0, 19, 1, 0, 0, 0, 0, 21, 1, 0, 
		    0, 0, 0, 23, 1, 0, 0, 0, 0, 25, 1, 0, 0, 0, 0, 27, 1, 0, 0, 0, 0, 
		    29, 1, 0, 0, 0, 0, 31, 1, 0, 0, 0, 0, 33, 1, 0, 0, 0, 0, 35, 1, 0, 
		    0, 0, 0, 37, 1, 0, 0, 0, 0, 39, 1, 0, 0, 0, 0, 41, 1, 0, 0, 0, 0, 
		    43, 1, 0, 0, 0, 0, 45, 1, 0, 0, 0, 0, 47, 1, 0, 0, 0, 0, 49, 1, 0, 
		    0, 0, 0, 57, 1, 0, 0, 0, 1, 59, 1, 0, 0, 0, 3, 61, 1, 0, 0, 0, 5, 
		    63, 1, 0, 0, 0, 7, 66, 1, 0, 0, 0, 9, 68, 1, 0, 0, 0, 11, 75, 1, 0, 
		    0, 0, 13, 85, 1, 0, 0, 0, 15, 103, 1, 0, 0, 0, 17, 105, 1, 0, 0, 0, 
		    19, 114, 1, 0, 0, 0, 21, 135, 1, 0, 0, 0, 23, 145, 1, 0, 0, 0, 25, 
		    155, 1, 0, 0, 0, 27, 166, 1, 0, 0, 0, 29, 168, 1, 0, 0, 0, 31, 184, 
		    1, 0, 0, 0, 33, 190, 1, 0, 0, 0, 35, 196, 1, 0, 0, 0, 37, 206, 1, 
		    0, 0, 0, 39, 214, 1, 0, 0, 0, 41, 216, 1, 0, 0, 0, 43, 218, 1, 0, 
		    0, 0, 45, 221, 1, 0, 0, 0, 47, 225, 1, 0, 0, 0, 49, 227, 1, 0, 0, 
		    0, 51, 239, 1, 0, 0, 0, 53, 241, 1, 0, 0, 0, 55, 243, 1, 0, 0, 0, 
		    57, 246, 1, 0, 0, 0, 59, 60, 5, 61, 0, 0, 60, 2, 1, 0, 0, 0, 61, 62, 
		    5, 62, 0, 0, 62, 4, 1, 0, 0, 0, 63, 64, 5, 62, 0, 0, 64, 65, 5, 61, 
		    0, 0, 65, 6, 1, 0, 0, 0, 66, 67, 5, 60, 0, 0, 67, 8, 1, 0, 0, 0, 68, 
		    69, 5, 60, 0, 0, 69, 70, 5, 61, 0, 0, 70, 10, 1, 0, 0, 0, 71, 72, 
		    5, 60, 0, 0, 72, 76, 5, 62, 0, 0, 73, 74, 5, 33, 0, 0, 74, 76, 5, 
		    61, 0, 0, 75, 71, 1, 0, 0, 0, 75, 73, 1, 0, 0, 0, 76, 12, 1, 0, 0, 
		    0, 77, 78, 5, 108, 0, 0, 78, 79, 5, 105, 0, 0, 79, 80, 5, 107, 0, 
		    0, 80, 86, 5, 101, 0, 0, 81, 82, 5, 76, 0, 0, 82, 83, 5, 73, 0, 0, 
		    83, 84, 5, 75, 0, 0, 84, 86, 5, 69, 0, 0, 85, 77, 1, 0, 0, 0, 85, 
		    81, 1, 0, 0, 0, 86, 14, 1, 0, 0, 0, 87, 88, 5, 99, 0, 0, 88, 89, 5, 
		    111, 0, 0, 89, 90, 5, 110, 0, 0, 90, 91, 5, 116, 0, 0, 91, 92, 5, 
		    97, 0, 0, 92, 93, 5, 105, 0, 0, 93, 94, 5, 110, 0, 0, 94, 104, 5, 
		    115, 0, 0, 95, 96, 5, 67, 0, 0, 96, 97, 5, 79, 0, 0, 97, 98, 5, 78, 
		    0, 0, 98, 99, 5, 84, 0, 0, 99, 100, 5, 65, 0, 0, 100, 101, 5, 73, 
		    0, 0, 101, 102, 5, 78, 0, 0, 102, 104, 5, 83, 0, 0, 103, 87, 1, 0, 
		    0, 0, 103, 95, 1, 0, 0, 0, 104, 16, 1, 0, 0, 0, 105, 109, 3, 21, 10, 
		    0, 106, 108, 5, 32, 0, 0, 107, 106, 1, 0, 0, 0, 108, 111, 1, 0, 0, 
		    0, 109, 107, 1, 0, 0, 0, 109, 110, 1, 0, 0, 0, 110, 112, 1, 0, 0, 
		    0, 111, 109, 1, 0, 0, 0, 112, 113, 3, 25, 12, 0, 113, 18, 1, 0, 0, 
		    0, 114, 118, 3, 23, 11, 0, 115, 117, 5, 32, 0, 0, 116, 115, 1, 0, 
		    0, 0, 117, 120, 1, 0, 0, 0, 118, 116, 1, 0, 0, 0, 118, 119, 1, 0, 
		    0, 0, 119, 121, 1, 0, 0, 0, 120, 118, 1, 0, 0, 0, 121, 122, 3, 25, 
		    12, 0, 122, 20, 1, 0, 0, 0, 123, 124, 5, 115, 0, 0, 124, 125, 5, 116, 
		    0, 0, 125, 126, 5, 97, 0, 0, 126, 127, 5, 114, 0, 0, 127, 128, 5, 
		    116, 0, 0, 128, 136, 5, 115, 0, 0, 129, 130, 5, 83, 0, 0, 130, 131, 
		    5, 84, 0, 0, 131, 132, 5, 65, 0, 0, 132, 133, 5, 82, 0, 0, 133, 134, 
		    5, 84, 0, 0, 134, 136, 5, 83, 0, 0, 135, 123, 1, 0, 0, 0, 135, 129, 
		    1, 0, 0, 0, 136, 22, 1, 0, 0, 0, 137, 138, 5, 101, 0, 0, 138, 139, 
		    5, 110, 0, 0, 139, 140, 5, 100, 0, 0, 140, 146, 5, 115, 0, 0, 141, 
		    142, 5, 69, 0, 0, 142, 143, 5, 78, 0, 0, 143, 144, 5, 68, 0, 0, 144, 
		    146, 5, 83, 0, 0, 145, 137, 1, 0, 0, 0, 145, 141, 1, 0, 0, 0, 146, 
		    24, 1, 0, 0, 0, 147, 148, 5, 119, 0, 0, 148, 149, 5, 105, 0, 0, 149, 
		    150, 5, 116, 0, 0, 150, 156, 5, 104, 0, 0, 151, 152, 5, 87, 0, 0, 
		    152, 153, 5, 73, 0, 0, 153, 154, 5, 84, 0, 0, 154, 156, 5, 72, 0, 
		    0, 155, 147, 1, 0, 0, 0, 155, 151, 1, 0, 0, 0, 156, 26, 1, 0, 0, 0, 
		    157, 158, 5, 116, 0, 0, 158, 159, 5, 114, 0, 0, 159, 160, 5, 117, 
		    0, 0, 160, 167, 5, 101, 0, 0, 161, 162, 5, 102, 0, 0, 162, 163, 5, 
		    97, 0, 0, 163, 164, 5, 108, 0, 0, 164, 165, 5, 115, 0, 0, 165, 167, 
		    5, 101, 0, 0, 166, 157, 1, 0, 0, 0, 166, 161, 1, 0, 0, 0, 167, 28, 
		    1, 0, 0, 0, 168, 172, 5, 39, 0, 0, 169, 173, 8, 0, 0, 0, 170, 171, 
		    5, 39, 0, 0, 171, 173, 5, 39, 0, 0, 172, 169, 1, 0, 0, 0, 172, 170, 
		    1, 0, 0, 0, 173, 174, 1, 0, 0, 0, 174, 172, 1, 0, 0, 0, 174, 175, 
		    1, 0, 0, 0, 175, 176, 1, 0, 0, 0, 176, 177, 5, 39, 0, 0, 177, 30, 
		    1, 0, 0, 0, 178, 179, 5, 97, 0, 0, 179, 180, 5, 110, 0, 0, 180, 185, 
		    5, 100, 0, 0, 181, 182, 5, 65, 0, 0, 182, 183, 5, 78, 0, 0, 183, 185, 
		    5, 68, 0, 0, 184, 178, 1, 0, 0, 0, 184, 181, 1, 0, 0, 0, 185, 32, 
		    1, 0, 0, 0, 186, 187, 5, 111, 0, 0, 187, 191, 5, 114, 0, 0, 188, 189, 
		    5, 79, 0, 0, 189, 191, 5, 82, 0, 0, 190, 186, 1, 0, 0, 0, 190, 188, 
		    1, 0, 0, 0, 191, 34, 1, 0, 0, 0, 192, 193, 5, 105, 0, 0, 193, 197, 
		    5, 115, 0, 0, 194, 195, 5, 73, 0, 0, 195, 197, 5, 83, 0, 0, 196, 192, 
		    1, 0, 0, 0, 196, 194, 1, 0, 0, 0, 197, 36, 1, 0, 0, 0, 198, 199, 5, 
		    110, 0, 0, 199, 200, 5, 117, 0, 0, 200, 201, 5, 108, 0, 0, 201, 207, 
		    5, 108, 0, 0, 202, 203, 5, 78, 0, 0, 203, 204, 5, 85, 0, 0, 204, 205, 
		    5, 76, 0, 0, 205, 207, 5, 76, 0, 0, 206, 198, 1, 0, 0, 0, 206, 202, 
		    1, 0, 0, 0, 207, 38, 1, 0, 0, 0, 208, 209, 5, 110, 0, 0, 209, 210, 
		    5, 111, 0, 0, 210, 215, 5, 116, 0, 0, 211, 212, 5, 78, 0, 0, 212, 
		    213, 5, 79, 0, 0, 213, 215, 5, 84, 0, 0, 214, 208, 1, 0, 0, 0, 214, 
		    211, 1, 0, 0, 0, 215, 40, 1, 0, 0, 0, 216, 217, 5, 40, 0, 0, 217, 
		    42, 1, 0, 0, 0, 218, 219, 5, 41, 0, 0, 219, 44, 1, 0, 0, 0, 220, 222, 
		    3, 55, 27, 0, 221, 220, 1, 0, 0, 0, 222, 223, 1, 0, 0, 0, 223, 221, 
		    1, 0, 0, 0, 223, 224, 1, 0, 0, 0, 224, 46, 1, 0, 0, 0, 225, 226, 5, 
		    46, 0, 0, 226, 48, 1, 0, 0, 0, 227, 237, 3, 51, 25, 0, 228, 232, 3, 
		    51, 25, 0, 229, 232, 5, 95, 0, 0, 230, 232, 3, 47, 23, 0, 231, 228, 
		    1, 0, 0, 0, 231, 229, 1, 0, 0, 0, 231, 230, 1, 0, 0, 0, 232, 235, 
		    1, 0, 0, 0, 233, 231, 1, 0, 0, 0, 233, 234, 1, 0, 0, 0, 234, 236, 
		    1, 0, 0, 0, 235, 233, 1, 0, 0, 0, 236, 238, 3, 51, 25, 0, 237, 233, 
		    1, 0, 0, 0, 237, 238, 1, 0, 0, 0, 238, 50, 1, 0, 0, 0, 239, 240, 7, 
		    1, 0, 0, 240, 52, 1, 0, 0, 0, 241, 242, 7, 2, 0, 0, 242, 54, 1, 0, 
		    0, 0, 243, 244, 7, 3, 0, 0, 244, 56, 1, 0, 0, 0, 245, 247, 7, 4, 0, 
		    0, 246, 245, 1, 0, 0, 0, 247, 248, 1, 0, 0, 0, 248, 246, 1, 0, 0, 
		    0, 248, 249, 1, 0, 0, 0, 249, 250, 1, 0, 0, 0, 250, 251, 6, 28, 0, 
		    0, 251, 58, 1, 0, 0, 0, 22, 0, 75, 85, 103, 109, 118, 135, 145, 155, 
		    166, 172, 174, 184, 190, 196, 206, 214, 223, 231, 233, 237, 248, 1, 
		    6, 0, 0];
		protected static $atn;
		protected static $decisionToDFA;
		protected static $sharedContextCache;
		public function __construct(CharStream $input)
		{
			parent::__construct($input);

			self::initialize();

			$this->interp = new LexerATNSimulator($this, self::$atn, self::$decisionToDFA, self::$sharedContextCache);
		}

		private static function initialize(): void
		{
			if (self::$atn !== null) {
				return;
			}

			RuntimeMetaData::checkVersion('4.10.1', RuntimeMetaData::VERSION);

			$atn = (new ATNDeserializer())->deserialize(self::SERIALIZED_ATN);

			$decisionToDFA = [];
			for ($i = 0, $count = $atn->getNumberOfDecisions(); $i < $count; $i++) {
				$decisionToDFA[] = new DFA($atn->getDecisionState($i), $i);
			}

			self::$atn = $atn;
			self::$decisionToDFA = $decisionToDFA;
			self::$sharedContextCache = new PredictionContextCache();
		}

		public static function vocabulary(): Vocabulary
		{
			static $vocabulary;

			return $vocabulary = $vocabulary ?? new VocabularyImpl(self::LITERAL_NAMES, self::SYMBOLIC_NAMES);
		}

		public function getGrammarFileName(): string
		{
			return 'ApiFilter.g4';
		}

		public function getRuleNames(): array
		{
			return self::RULE_NAMES;
		}

		public function getSerializedATN(): array
		{
			return self::SERIALIZED_ATN;
		}

		/**
		 * @return array<string>
		 */
		public function getChannelNames(): array
		{
			return self::CHANNEL_NAMES;
		}

		/**
		 * @return array<string>
		 */
		public function getModeNames(): array
		{
			return self::MODE_NAMES;
		}

		public function getATN(): ATN
		{
			return self::$atn;
		}

		public function getVocabulary(): Vocabulary
		{
			return self::vocabulary();
		}
	}
}