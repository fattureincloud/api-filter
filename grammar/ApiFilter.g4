grammar ApiFilter;

/*
 * Parser Rules
 */

filter: expression EOF;

expression:
	condition						# conditionExp
	| OPEN_PAR expression CLOSE_PAR	# parenthesisExp
	| expression AND expression		# conjunctionExp
	| expression OR expression		# disjunctionExp;

condition:
	comparison	# comparisonCondition
	| emptyfield		# emptyCondition
	| filledfield	# filledCondition;

comparison: FIELD op value;
emptyfield: FIELD (EQ | IS) NULL;
filledfield: FIELD (NEQ | IS NOT) NULL;

op: EQ | GT | GTE | LT | LTE | NEQ | LIKE;
value: (BOOL | STRING | integer | decimal);

integer: INT;
decimal: INT DOT INT;

/*
 * Lexer Rules
 */

EQ: '=';
GT: '>';
GTE: '>=';
LT: '<';
LTE: '<=';
NEQ: ('<>' | '!=');
LIKE: ('like' | 'LIKE');

BOOL: ('true' | 'false');
STRING: '\'' ( ~'\'' | '\'\'')+ '\'';

AND: ('and' | 'AND');
OR: ('or' | 'OR');
NOT: ('not' | 'NOT');

IS: ('is' | 'IS');
NULL: ('null' | 'NULL');

OPEN_PAR: '(';
CLOSE_PAR: ')';

DOT: '.';

INT: (DIGIT)+;

FIELD: LOWERCASE (( LOWERCASE | '_' | '.')* LOWERCASE)?;

fragment LOWERCASE: [a-z];
fragment UPPERCASE: [A-Z];
fragment DIGIT: [0-9];

WS: [ \t\r\n]+ -> skip;