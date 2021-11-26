grammar ApiFilter;

/*
 * Parser Rules
 */

filter: expression EOF;

expression:
	condition						# conditionExp
	| OPEN_PAR expression CLOSE_PAR	# parenthesisExp
	| NOT expression				# negationExp
	| expression AND expression		# conjunctionExp
	| expression OR expression		# disjunctionExp;

condition: FIELD op value;
op: EQ | GT | GTE | LT | LTE | NEQ | LIKE;
value: (BOOL | STRING | integer | double);

integer: INT;
double: INT DOT INT;

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

OPEN_PAR: '(';
CLOSE_PAR: ')';

DOT: '.';

INT: (DIGIT)+;

FIELD: LOWERCASE (( LOWERCASE | '_' | '.')+ LOWERCASE)?;

fragment LOWERCASE: [a-z];
fragment UPPERCASE: [A-Z];
fragment DIGIT: [0-9];

WS: [ \t\r\n]+ -> skip;
