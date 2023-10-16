grammar ApiFilter;

/*
 * Parser Rules
 */

filter: expression EOF;

expression:
	condition						# conditionExp
	| pattern						# patternExp
	| OPEN_PAR expression CLOSE_PAR	# parenthesisExp
	| expression AND expression		# conjunctionExp
	| expression OR expression		# disjunctionExp;

condition:
	comparison		# comparisonCondition
	| emptyfield	# emptyCondition
	| filledfield	# filledCondition;

comparison: FIELD comparisonop value;
emptyfield: FIELD (EQ | IS) NULL;
filledfield: FIELD (NEQ | IS NOT) NULL;

comparisonop: EQ | GT | GTE | LT | LTE | NEQ;
value: (BOOL | STRING | integer | decimal);

pattern: FIELD patternop STRING;
patternop: LIKE | CONTAINS | NOT LIKE | NOT CONTAINS | STARTSWITH | ENDSWITH;

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
CONTAINS: ('contains' | 'CONTAINS');
STARTSWITH: STARTS ' '* WITH;
ENDSWITH: ENDS ' '* WITH;

STARTS: ('starts' | 'STARTS');
ENDS: ('ends' | 'ENDS');
WITH: ('with' | 'WITH');

BOOL: ('true' | 'false');
STRING: '\'\'' | '\'' ( ~'\'' | '\'\'')+ '\'';

AND: ('and' | 'AND');
OR: ('or' | 'OR');

IS: ('is' | 'IS');
NULL: ('null' | 'NULL');
NOT: ('not' | 'NOT');

OPEN_PAR: '(';
CLOSE_PAR: ')';

INT: (DIGIT)+;

DOT: '.';

FIELD: LOWERCASE (( LOWERCASE | '_' | DOT)* LOWERCASE)?;


fragment LOWERCASE: [a-z];
fragment UPPERCASE: [A-Z];
fragment DIGIT: [0-9];

WS: [ \t\r\n]+ -> skip;