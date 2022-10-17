<?php

declare(strict_types=1);

namespace FattureInCloud\ApiFilter;

use FattureInCloud\ApiFilter\Filter\Condition;
use FattureInCloud\ApiFilter\Filter\Conjunction;
use FattureInCloud\ApiFilter\Filter\Disjunction;
use FattureInCloud\ApiFilter\Filter\Filter;
use FattureInCloud\ApiFilter\Filter\Operator;
use PHPUnit\Framework\TestCase;
use Antlr\Antlr4\Runtime\Error\Exceptions\ParseCancellationException;

class FilterFactoryTest extends TestCase
{
    public $factory;

    /**
     * Setup before running any test cases
     */
    public static function setUpBeforeClass(): void
    {
    }

    /**
     * Setup before running each test case
     */
    public function setUp(): void
    {
        $this->factory = new FilterFactory();
    }

    /**
     * Clean up after running each test case
     */
    public function tearDown(): void
    {
    }

    /**
     * Clean up after running all test cases
     */
    public static function tearDownAfterClass(): void
    {
    }

    /**
     * Test 'equal to' operator
     */
    public function testEqualToOp()
    {
        $filter = $this->factory->initFilter("name = true");
        $expected = new Filter(new Condition("name", Operator::EQ, true));
        $this->assertEquals($expected, $filter);
    }

    /**
     * Test 'greater than' operator
     */
    public function testGreaterThanOp()
    {
        $filter = $this->factory->initFilter("name > true");
        $expected = new Filter(new Condition("name", Operator::GT, true));
        $this->assertEquals($expected, $filter);
    }

    /**
     * Test 'greater than or equal to' operator
     */
    public function testGreaterThanOrEqualToOp()
    {
        $filter = $this->factory->initFilter("name >= true");
        $expected = new Filter(new Condition("name", Operator::GTE, true));
        $this->assertEquals($expected, $filter);
    }

    /**
     * Test 'lower than' operator
     */
    public function testLowerThanOp()
    {
        $filter = $this->factory->initFilter("name < true");
        $expected = new Filter(new Condition("name", Operator::LT, true));
        $this->assertEquals($expected, $filter);
    }

    /**
     * Test 'lower than or equal to' operator
     */
    public function testLowerThanOrEqualToOp()
    {
        $filter = $this->factory->initFilter("name <= true");
        $expected = new Filter(new Condition("name", Operator::LTE, true));
        $this->assertEquals($expected, $filter);
    }

    /**
     * Test 'not equal to' operator
     */
    public function testNotEqualToOp()
    {
        $filter = $this->factory->initFilter("name <> true");
        $expected = new Filter(new Condition("name", Operator::NEQ, true));
        $this->assertEquals($expected, $filter);
    }

    /**
     * Test 'not equal to' with exclamation operator
     */
    public function testNotEqualToOpWithExclanation()
    {
        $filter = $this->factory->initFilter("name != true");
        $expected = new Filter(new Condition("name", Operator::NEQ, true));
        $this->assertEquals($expected, $filter);
    }

    /**
     * Test 'like' operator
     */
    public function testLikeOp()
    {
        $filter1 = $this->factory->initFilter("name like '%ergam%'");
        $expected1 = new Filter(new Condition("name", Operator::LIKE, "%ergam%"));
        $this->assertEquals($expected1, $filter1);

        $filter2 = $this->factory->initFilter("name LIKE '%ergam%'");
        $expected2 = new Filter(new Condition("name", Operator::LIKE, "%ergam%"));
        $this->assertEquals($expected2, $filter2);
    }

    /**
     * Test 'contains' operator
     */
    public function testContainsOp()
    {
        $filter1 = $this->factory->initFilter("name contains 'ergam'");
        $expected1 = new Filter(new Condition("name", Operator::CONTAINS, "ergam"));
        $this->assertEquals($expected1, $filter1);

        $filter2 = $this->factory->initFilter("name CONTAINS 'ergam'");
        $expected2 = new Filter(new Condition("name", Operator::CONTAINS, "ergam"));
        $this->assertEquals($expected2, $filter2);
    }

    /**
     * Test 'not like' operator
     */
    public function testNotLikeOp()
    {
        $filter1 = $this->factory->initFilter("name not like '%ergam%'");
        $expected1 = new Filter(new Condition("name", Operator::NOT_LIKE, "%ergam%"));
        $this->assertEquals($expected1, $filter1);

        $filter2 = $this->factory->initFilter("name NOT LIKE '%ergam%'");
        $expected2 = new Filter(new Condition("name", Operator::NOT_LIKE, "%ergam%"));
        $this->assertEquals($expected2, $filter2);
    }

    /**
     * Test 'not contains' operator
     */
    public function testNotContainsOp()
    {
        $filter1 = $this->factory->initFilter("name not contains 'ergam'");
        $expected1 = new Filter(new Condition("name", Operator::NOT_CONTAINS, "ergam"));
        $this->assertEquals($expected1, $filter1);

        $filter2 = $this->factory->initFilter("name NOT CONTAINS 'ergam'");
        $expected2 = new Filter(new Condition("name", Operator::NOT_CONTAINS, "ergam"));
        $this->assertEquals($expected2, $filter2);
    }

    /**
     * Test 'starts with' operator
     */
    public function testStartsWithOp()
    {
        $filter1 = $this->factory->initFilter("name starts with 'Mariano'");
        $expected1 = new Filter(new Condition("name", Operator::STARTS_WITH, "Mariano"));
        $this->assertEquals($expected1, $filter1);

        $filter2 = $this->factory->initFilter("name STARTS WITH 'Mariano'");
        $expected2 = new Filter(new Condition("name", Operator::STARTS_WITH, "Mariano"));
        $this->assertEquals($expected2, $filter2);

        $filter3 = $this->factory->initFilter("name starts WITH 'Mariano'");
        $expected3 = new Filter(new Condition("name", Operator::STARTS_WITH, "Mariano"));
        $this->assertEquals($expected3, $filter3);

        $filter4 = $this->factory->initFilter("name STARTS with 'Mariano'");
        $expected4 = new Filter(new Condition("name", Operator::STARTS_WITH, "Mariano"));
        $this->assertEquals($expected4, $filter4);

        $filter5 = $this->factory->initFilter("name startswith 'Mariano'");
        $expected5 = new Filter(new Condition("name", Operator::STARTS_WITH, "Mariano"));
        $this->assertEquals($expected5, $filter5);

        $filter6 = $this->factory->initFilter("name STARTSWITH 'Mariano'");
        $expected6 = new Filter(new Condition("name", Operator::STARTS_WITH, "Mariano"));
        $this->assertEquals($expected6, $filter6);
    }

    /**
     * Test 'ends with' operator
     */
    public function testEndsWithOp()
    {
        $filter1 = $this->factory->initFilter("name ends with 'al Brembo'");
        $expected1 = new Filter(new Condition("name", Operator::ENDS_WITH, "al Brembo"));
        $this->assertEquals($expected1, $filter1);

        $filter2 = $this->factory->initFilter("name ENDS WITH 'al Brembo'");
        $expected2 = new Filter(new Condition("name", Operator::ENDS_WITH, "al Brembo"));
        $this->assertEquals($expected2, $filter2);

        $filter3 = $this->factory->initFilter("name ends WITH 'al Brembo'");
        $expected3 = new Filter(new Condition("name", Operator::ENDS_WITH, "al Brembo"));
        $this->assertEquals($expected3, $filter3);

        $filter4 = $this->factory->initFilter("name ENDS with 'al Brembo'");
        $expected4 = new Filter(new Condition("name", Operator::ENDS_WITH, "al Brembo"));
        $this->assertEquals($expected4, $filter4);

        $filter5 = $this->factory->initFilter("name endswith 'al Brembo'");
        $expected5 = new Filter(new Condition("name", Operator::ENDS_WITH, "al Brembo"));
        $this->assertEquals($expected5, $filter5);

        $filter6 = $this->factory->initFilter("name ENDSWITH 'al Brembo'");
        $expected6 = new Filter(new Condition("name", Operator::ENDS_WITH, "al Brembo"));
        $this->assertEquals($expected6, $filter6);
    }

    /**
     * Test no not starts with operator
     */
    public function testNoNotStartsWithOperator()
    {
        $this->expectException(ParseCancellationException::class);
        $this->factory->initFilter("name not starts with 'Mariano'");
    }

    /**
     * Test no not ends with operator
     */
    public function testNoNotEndsWithOperator()
    {
        $this->expectException(ParseCancellationException::class);
        $this->factory->initFilter("name not ends with 'Mariano'");
    }

    /**
     * Test no starts operator
     */
    public function testNoStartsOperator()
    {
        $this->expectException(ParseCancellationException::class);
        $this->factory->initFilter("name starts 'Mariano'");
    }

    /**
     * Test no ends operator
     */
    public function testNoEndsOperator()
    {
        $this->expectException(ParseCancellationException::class);
        $this->factory->initFilter("name ends 'Mariano'");
    }

    /**
     * Test no with operator
     */
    public function testNoWithOperator()
    {
        $this->expectException(ParseCancellationException::class);
        $this->factory->initFilter("name with 'Mariano'");
    }

    /**
     * Test field name
     */
    public function testFieldName()
    {
        $filter1 = $this->factory->initFilter("name = true");
        $expected1 = new Filter(new Condition("name", Operator::EQ, true));
        $this->assertEquals($expected1, $filter1);

        $filter2 = $this->factory->initFilter("field_name = true");
        $expected2 = new Filter(new Condition("field_name", Operator::EQ, true));
        $this->assertEquals($expected2, $filter2);

        $filter3 = $this->factory->initFilter("person.age = true");
        $expected3 = new Filter(new Condition("person.age", Operator::EQ, true));
        $this->assertEquals($expected3, $filter3);

        $filter4 = $this->factory->initFilter("person.last_name = true");
        $expected4 = new Filter(new Condition("person.last_name", Operator::EQ, true));
        $this->assertEquals($expected4, $filter4);

        $filter5 = $this->factory->initFilter("person_name.first = true");
        $expected5 = new Filter(new Condition("person_name.first", Operator::EQ, true));
        $this->assertEquals($expected5, $filter5);
    }

    /**
     * Test field name with length 1
     */
    public function testOneLenField()
    {
        $filter = $this->factory->initFilter("x = 1");
        $expected = new Filter(new Condition("x", Operator::EQ, 1));
        $this->assertEquals($expected, $filter);
    }

    /**
     * Test field name with length 2
     */
    public function testTwoLenField()
    {
        $filter = $this->factory->initFilter("id = 2");
        $expected = new Filter(new Condition("id", Operator::EQ, 2));
        $this->assertEquals($expected, $filter);
    }

    /**
     * Test long field name
     */
    public function testLongField()
    {
        $fieldName = "ilkobranoneunserpentemaunpensierofrequentechediventaindecentequandovedotequandovedotequandovedotequandovedote";
        $filter = $this->factory->initFilter($fieldName . " = 109");
        $expected = new Filter(new Condition($fieldName, Operator::EQ, 109));
        $this->assertEquals($expected, $filter);
    }

    /**
     * Test field with unexpected character
     */
    public function testUnexpectedCharacterField()
    {
        $this->expectException(ParseCancellationException::class);
        $this->factory->initFilter("s.cooper@fattureincloud.it = 1");
    }

    /**
     * Test missing field name
     */
    public function testMissingFieldName()
    {
        $this->expectException(ParseCancellationException::class);
        $this->factory->initFilter(" = true");
    }

    /**
     * Test missing field name followed by like
     */
    public function testMissingFieldNameFollowedByLike()
    {
        $this->expectException(ParseCancellationException::class);
        $this->factory->initFilter("like true");
    }

    /**
     * Test boolean value
     */
    public function testBooleanValue()
    {
        $filter1 = $this->factory->initFilter("name = true");
        $expected1 = new Filter(new Condition("name", Operator::EQ, true));
        $this->assertEquals($expected1, $filter1);

        $filter2 = $this->factory->initFilter("name = false");
        $expected2 = new Filter(new Condition("name", Operator::EQ, false));
        $this->assertEquals($expected2, $filter2);
    }

    /**
     * Test number value
     */
    public function testNumberValue()
    {
        $filter1 = $this->factory->initFilter("name = 5000");
        $expected1 = new Filter(new Condition("name", Operator::EQ, 5000));
        $this->assertEquals($expected1, $filter1);

        $filter2 = $this->factory->initFilter("name = 5123.2555");
        $expected2 = new Filter(new Condition("name", Operator::EQ, 5123.2555));
        $this->assertEquals($expected2, $filter2);
    }

    /**
     * Test no digit before dot
     */
    public function testNoDigitBeforeDot()
    {
        $this->expectException(ParseCancellationException::class);
        $this->factory->initFilter("name = .444");
    }

    /**
     * Test no digit after dot
     */
    public function testNoDigitAfterDot()
    {
        $this->expectException(ParseCancellationException::class);
        $this->factory->initFilter("name = 54.");
    }

    /**
     * Test no multiple dots
     */
    public function testNoMultipleDots()
    {
        $this->expectException(ParseCancellationException::class);
        $this->factory->initFilter("name = 666..444");
    }

    /**
     * Test string value
     */
    public function testStringValue()
    {
        $filter1 = $this->factory->initFilter("name = 'Guillaume'");
        $expected1 = new Filter(new Condition("name", Operator::EQ, "Guillaume"));
        $this->assertEquals($expected1, $filter1);

        $filter2 = $this->factory->initFilter("name = '5123.2555'");
        $expected2 = new Filter(new Condition("name", Operator::EQ, '5123.2555'));
        $this->assertEquals($expected2, $filter2);

        $filter3 = $this->factory->initFilter("name = '     '");
        $expected3 = new Filter(new Condition("name", Operator::EQ, '     '));
        $this->assertEquals($expected3, $filter3);

        $filter4 = $this->factory->initFilter("name = '\"'");
        $expected4 = new Filter(new Condition("name", Operator::EQ, '"'));
        $this->assertEquals($expected4, $filter4);

        $filter5 = $this->factory->initFilter("name = 'true'");
        $expected5 = new Filter(new Condition("name", Operator::EQ, 'true'));
        $this->assertEquals($expected5, $filter5);

        $filter6 = $this->factory->initFilter("name = 'false'");
        $expected6 = new Filter(new Condition("name", Operator::EQ, 'false'));
        $this->assertEquals($expected6, $filter6);

        $filter7 = $this->factory->initFilter("name = 'null'");
        $expected7 = new Filter(new Condition("name", Operator::EQ, 'null'));
        $this->assertEquals($expected7, $filter7);

        $filter8 = $this->factory->initFilter("name = 'NULL'");
        $expected8 = new Filter(new Condition("name", Operator::EQ, 'NULL'));
        $this->assertEquals($expected8, $filter8);

        $filter9 = $this->factory->initFilter("name != 'null'");
        $expected9 = new Filter(new Condition("name", Operator::NEQ, 'null'));
        $this->assertEquals($expected9, $filter9);

        $filter10 = $this->factory->initFilter("name != 'NULL'");
        $expected10 = new Filter(new Condition("name", Operator::NEQ, 'NULL'));
        $this->assertEquals($expected10, $filter10);

        $filter11 = $this->factory->initFilter("name <> 'null'");
        $expected11 = new Filter(new Condition("name", Operator::NEQ, 'null'));
        $this->assertEquals($expected11, $filter11);

        $filter12 = $this->factory->initFilter("name <> 'NULL'");
        $expected12 = new Filter(new Condition("name", Operator::NEQ, 'NULL'));
        $this->assertEquals($expected12, $filter12);

        $filter13 = $this->factory->initFilter("show = 'Italia''s got talent'");
        $expected13 = new Filter(new Condition("show", Operator::EQ, "Italia's got talent"));
        $this->assertEquals($expected13, $filter13);

        $filter14 = $this->factory->initFilter("name = 'Eustass ''Captain'' Kid'");
        $expected14 = new Filter(new Condition("name", Operator::EQ, "Eustass 'Captain' Kid"));
        $this->assertEquals($expected14, $filter14);
    }

    /**
     * Test no single quote in string
     */
    public function testNoSingleQuoteInString()
    {
        $this->expectException(ParseCancellationException::class);
        $this->factory->initFilter("name = 'Italia's got talent'");
    }

    /**
     * Test no missing quotation
     */
    public function testNoMissingQuotation()
    {
        $this->expectException(ParseCancellationException::class);
        $this->factory->initFilter("name = cooper");
    }

    /**
     * Test no missing left quotation
     */
    public function testNoMissingLeftQuotation()
    {
        $this->expectException(ParseCancellationException::class);
        $this->factory->initFilter("name = cooper'");
    }

    /**
     * Test no missing right quotation
     */
    public function testNoMissingRightQuotation()
    {
        $this->expectException(ParseCancellationException::class);
        $this->factory->initFilter("name = cooper'");
    }

    /**
     * Test no missing operator
     */
    public function testNoMissingOperator()
    {
        $this->expectException(ParseCancellationException::class);
        $this->factory->initFilter("name true");
    }

    /**
     * Test no missing value
     */
    public function testNoMissingValue()
    {
        $this->expectException(ParseCancellationException::class);
        $this->factory->initFilter("name = ");
    }

    /**
     * Test null field condition
     */
    public function testNullField()
    {
        $filter1 = $this->factory->initFilter("name = NULL");
        $expected1 = new Filter(new Condition("name", Operator::EQ, null));
        $this->assertEquals($expected1, $filter1);

        $filter2 = $this->factory->initFilter("address = null");
        $expected2 = new Filter(new Condition("address", Operator::EQ, null));
        $this->assertEquals($expected2, $filter2);

        $filter3 = $this->factory->initFilter("surname is null");
        $expected3 = new Filter(new Condition("surname", Operator::EQ, null));
        $this->assertEquals($expected3, $filter3);

        $filter4 = $this->factory->initFilter("income is NULL");
        $expected4 = new Filter(new Condition("income", Operator::EQ, null));
        $this->assertEquals($expected4, $filter4);

        $filter5 = $this->factory->initFilter("girlfriend IS NULL");
        $expected5 = new Filter(new Condition("girlfriend", Operator::EQ, null));
        $this->assertEquals($expected5, $filter5);

        $filter6 = $this->factory->initFilter("car IS null");
        $expected6 = new Filter(new Condition("car", Operator::EQ, null));
        $this->assertEquals($expected6, $filter6);
    }

    /**
     * Test no other operator with null
     */
    public function testNoOtherOperatorWithNull()
    {
        $this->expectException(ParseCancellationException::class);
        $this->factory->initFilter("name < NULL");
    }

    /**
     * Test no string value with IS
     */
    public function testNoStringValueWithIs()
    {
        $this->expectException(ParseCancellationException::class);
        $this->factory->initFilter("name IS 'NULL'");
    }

    /**
     * Test not null field condition
     */
    public function testNotNullField()
    {
        $filter1 = $this->factory->initFilter("name != NULL");
        $expected1 = new Filter(new Condition("name", Operator::NEQ, null));
        $this->assertEquals($expected1, $filter1);

        $filter2 = $this->factory->initFilter("address != null");
        $expected2 = new Filter(new Condition("address", Operator::NEQ, null));
        $this->assertEquals($expected2, $filter2);

        $filter3 = $this->factory->initFilter("surname is not null");
        $expected3 = new Filter(new Condition("surname", Operator::NEQ, null));
        $this->assertEquals($expected3, $filter3);

        $filter4 = $this->factory->initFilter("income is not NULL");
        $expected4 = new Filter(new Condition("income", Operator::NEQ, null));
        $this->assertEquals($expected4, $filter4);

        $filter5 = $this->factory->initFilter("girlfriend IS not NULL");
        $expected5 = new Filter(new Condition("girlfriend", Operator::NEQ, null));
        $this->assertEquals($expected5, $filter5);

        $filter6 = $this->factory->initFilter("car IS not null");
        $expected6 = new Filter(new Condition("car", Operator::NEQ, null));
        $this->assertEquals($expected6, $filter6);

        $filter7 = $this->factory->initFilter("football_team <> NULL");
        $expected7 = new Filter(new Condition("football_team", Operator::NEQ, null));
        $this->assertEquals($expected7, $filter7);

        $filter8 = $this->factory->initFilter("volleyball_team <> null");
        $expected8 = new Filter(new Condition("volleyball_team", Operator::NEQ, null));
        $this->assertEquals($expected8, $filter8);

        $filter9 = $this->factory->initFilter("basketball_team is NOT null");
        $expected9 = new Filter(new Condition("basketball_team", Operator::NEQ, null));
        $this->assertEquals($expected9, $filter9);

        $filter10 = $this->factory->initFilter("favourite_singer is NOT NULL");
        $expected10 = new Filter(new Condition("favourite_singer", Operator::NEQ, null));
        $this->assertEquals($expected10, $filter10);

        $filter11 = $this->factory->initFilter("banana IS NOT NULL");
        $expected11 = new Filter(new Condition("banana", Operator::NEQ, null));
        $this->assertEquals($expected11, $filter11);

        $filter12 = $this->factory->initFilter("driving_license IS NOT null");
        $expected12 = new Filter(new Condition("driving_license", Operator::NEQ, null));
        $this->assertEquals($expected12, $filter12);
    }

    /**
     * Test no other operator with not null
     */
    public function testNoOtherOperatorWithNotNull()
    {
        $this->expectException(ParseCancellationException::class);
        $this->factory->initFilter("name < NOT NULL");
    }

    /**
     * Test no string value with IS NOT
     */
    public function testNoStringValueWithIsNot()
    {
        $this->expectException(ParseCancellationException::class);
        $this->factory->initFilter("name IS NOT 'NULL'");
    }

    /**
     * Test no NOT operator
     */
    public function testNoNotOperator()
    {
        $this->expectException(ParseCancellationException::class);
        $this->factory->initFilter("name NOT NULL");
    }

    /**
     * Test parenthesis
     */
    public function testParenthesis()
    {
        $filter = $this->factory->initFilter("(name = true)");
        $expected = new Filter(new Condition("name", Operator::EQ, true));
        $this->assertEquals($expected, $filter);
    }

    /**
     * Test missing left parenthesis
     */
    public function testNoMissingLeftParenthesis()
    {
        $this->expectException(ParseCancellationException::class);
        $this->factory->initFilter("name = 'Guillaume')");
    }

    /**
     * Test missing left parenthesis
     */
    public function testNoMissingRightParenthesis()
    {
        $this->expectException(ParseCancellationException::class);
        $this->factory->initFilter("(name = 'Guillaume'");
    }

    /**
     * Test conjunction
     */
    public function testConjunction()
    {
        $filter1 = $this->factory->initFilter("name = 'Guillaume' and company <> 'FIC'");
        $expected1 = new Filter(
            new Conjunction(
                new Condition("name", Operator::EQ, "Guillaume"),
                new Condition("company", Operator::NEQ, "FIC")
            )
        );
        $this->assertEquals($expected1, $filter1);

        $filter2 = $this->factory->initFilter("name = 'Guillaume' AND company <> 'FIC'");
        $expected2 = new Filter(
            new Conjunction(
                new Condition("name", Operator::EQ, "Guillaume"),
                new Condition("company", Operator::NEQ, "FIC")
            )
        );
        $this->assertEquals($expected2, $filter2);

        $filter3 = $this->factory->initFilter("(name = 'Guillaume') and company <> 'FIC'");
        $expected3 = new Filter(
            new Conjunction(
                new Condition("name", Operator::EQ, "Guillaume"),
                new Condition("company", Operator::NEQ, "FIC")
            )
        );
        $this->assertEquals($expected3, $filter3);

        $filter4 = $this->factory->initFilter("name = 'Guillaume' and (company <> 'FIC')");
        $expected4 = new Filter(
            new Conjunction(
                new Condition("name", Operator::EQ, "Guillaume"),
                new Condition("company", Operator::NEQ, "FIC")
            )
        );
        $this->assertEquals($expected4, $filter4);

        $filter5 = $this->factory->initFilter("(name = 'Guillaume' and company <> 'FIC')");
        $expected5 = new Filter(
            new Conjunction(
                new Condition("name", Operator::EQ, "Guillaume"),
                new Condition("company", Operator::NEQ, "FIC")
            )
        );
        $this->assertEquals($expected5, $filter5);

        $this->expectException(ParseCancellationException::class);
        $this->factory->initFilter("and = 'Guillaume'");
    }

    /**
     * Test no missing left exp conjunction
     */
    public function testNoMissingLeftExpConjunction()
    {
        $this->expectException(ParseCancellationException::class);
        $this->factory->initFilter("and name = 'Guillaume'");
    }

    /**
     * Test no missing right exp conjunction
     */
    public function testNoMissingRightExpConjunction()
    {
        $this->expectException(ParseCancellationException::class);
        $this->factory->initFilter("name = 'Guillaume' and");
    }

    /**
     * Test disjunction
     */
    public function testDisjunction()
    {
        $filter1 = $this->factory->initFilter("name = 'Guillaume' or company <> 'FIC'");
        $expected1 = new Filter(
            new Disjunction(
                new Condition("name", Operator::EQ, "Guillaume"),
                new Condition("company", Operator::NEQ, "FIC")
            )
        );
        $this->assertEquals($expected1, $filter1);

        $filter2 = $this->factory->initFilter("name = 'Guillaume' OR company <> 'FIC'");
        $expected2 = new Filter(
            new Disjunction(
                new Condition("name", Operator::EQ, "Guillaume"),
                new Condition("company", Operator::NEQ, "FIC")
            )
        );
        $this->assertEquals($expected2, $filter2);

        $filter3 = $this->factory->initFilter("(name = 'Guillaume') or company <> 'FIC'");
        $expected3 = new Filter(
            new Disjunction(
                new Condition("name", Operator::EQ, "Guillaume"),
                new Condition("company", Operator::NEQ, "FIC")
            )
        );
        $this->assertEquals($expected3, $filter3);

        $filter4 = $this->factory->initFilter("name = 'Guillaume' or (company <> 'FIC')");
        $expected4 = new Filter(
            new Disjunction(
                new Condition("name", Operator::EQ, "Guillaume"),
                new Condition("company", Operator::NEQ, "FIC")
            )
        );
        $this->assertEquals($expected4, $filter4);

        $filter5 = $this->factory->initFilter("(name = 'Guillaume' or company <> 'FIC')");
        $expected5 = new Filter(
            new Disjunction(
                new Condition("name", Operator::EQ, "Guillaume"),
                new Condition("company", Operator::NEQ, "FIC")
            )
        );
        $this->assertEquals($expected5, $filter5);

        $this->expectException(ParseCancellationException::class);
        $this->factory->initFilter("or = 'Guillaume'");
    }

    /**
     * Test no missing left exp disjunction
     */
    public function testNoMissingLeftExpDisjunction()
    {
        $this->expectException(ParseCancellationException::class);
        $this->factory->initFilter("or name = 'Guillaume'");
    }

    /**
     * Test no missing right exp disjunction
     */
    public function testNoMissingRightExpDisjunction()
    {
        $this->expectException(ParseCancellationException::class);
        $this->factory->initFilter("name = 'Guillaume' or");
    }

    /**
     * Test complex expressions
     */
    public function testComplexExpressions()
    {
        $filter1 = $this->factory->initFilter("name = 'Guillaume' and (city = 'Bergamo' or company <> 'FIC')");
        $expected1 = new Filter(
            new Conjunction(
                new Condition("name", Operator::EQ, "Guillaume"),
                new Disjunction(
                    new Condition("city", Operator::EQ, "Bergamo"),
                    new Condition("company", Operator::NEQ, "FIC")
                )
            )
        );
        $this->assertEquals($expected1, $filter1);

        $filter2 = $this->factory->initFilter("name = 'Guillaume' and (city = 'Bergamo' or company is not null)");
        $expected2 = new Filter(
            new Conjunction(
                new Condition("name", Operator::EQ, "Guillaume"),
                new Disjunction(
                    new Condition("city", Operator::EQ, "Bergamo"),
                    new Condition("company", Operator::NEQ, null)
                )
            )
        );
        $this->assertEquals($expected2, $filter2);

        $filter3 = $this->factory->initFilter("(name = 'Guillaume' and city = 'Bergamo' or company <> 'FIC')");
        $expected3 = new Filter(
            new Disjunction(
                new Conjunction(
                    new Condition("name", Operator::EQ, "Guillaume"),
                    new Condition("city", Operator::EQ, "Bergamo")
                ),
                new Condition("company", Operator::NEQ, "FIC")
            )
        );
        $this->assertEquals($expected3, $filter3);

        $filter4 = $this->factory->initFilter("(name = 'Guillaume' and city = 'Bergamo') or company <> 'FIC'");
        $expected4 = new Filter(
            new Disjunction(
                new Conjunction(
                    new Condition("name", Operator::EQ, "Guillaume"),
                    new Condition("city", Operator::EQ, "Bergamo")
                ),
                new Condition("company", Operator::NEQ, "FIC")
            )
        );
        $this->assertEquals($expected4, $filter4);

        $filter5 = $this->factory->initFilter("(name = 'Guillaume' and city = 'Bergamo') or company is null");
        $expected5 = new Filter(
            new Disjunction(
                new Conjunction(
                    new Condition("name", Operator::EQ, "Guillaume"),
                    new Condition("city", Operator::EQ, "Bergamo")
                ),
                new Condition("company", Operator::EQ, null)
            )
        );
        $this->assertEquals($expected5, $filter5);

        $filter6 = $this->factory->initFilter("name = 'Guillaume' and city = 'Bergamo' and company <> 'FIC'");
        $expected6 = new Filter(
            new Conjunction(
                new Conjunction(
                    new Condition("name", Operator::EQ, "Guillaume"),
                    new Condition("city", Operator::EQ, "Bergamo")
                ),
                new Condition("company", Operator::NEQ, "FIC")
            )
        );
        $this->assertEquals($expected6, $filter6);

        $filter7 = $this->factory->initFilter("name = 'Guillaume' or city = 'Bergamo' or company <> 'FIC'");
        $expected7 = new Filter(
            new Disjunction(
                new Disjunction(
                    new Condition("name", Operator::EQ, "Guillaume"),
                    new Condition("city", Operator::EQ, "Bergamo")
                ),
                new Condition("company", Operator::NEQ, "FIC")
            )
        );
        $this->assertEquals($expected7, $filter7);

        $filter8 = $this->factory->initFilter("city = 'Bergamo' and (age < 30 or (dev = true and (name = 'Giorgio' and surname is not null) or employer starts with 'Fatture'))");
        $expected8 = new Filter(
            new Conjunction(
                new Condition("city", Operator::EQ, "Bergamo"),
                new Disjunction(
                    new Condition("age", Operator::LT, 30),
                    new Disjunction(
                        new Conjunction(
                            new Condition("dev", Operator::EQ, true),
                            new Conjunction(
                                new Condition("name", Operator::EQ, "Giorgio"),
                                new Condition("surname", Operator::NEQ, null)
                            )
                        ),
                        new Condition("employer", Operator::STARTS_WITH, "Fatture")
                    )
                )
            )
        );
        $this->assertEquals($expected8, $filter8);
    }

    /**
     * Test no empty filter
     */
    public function testNoEmptyFilter()
    {
        $this->expectException(ParseCancellationException::class);
        $this->factory->initFilter("");
    }

    /**
     * Test no null filter
     */
    public function testNoNullFilter()
    {
        $this->expectException(ParseCancellationException::class);
        $this->factory->initFilter((string)null);
    }

    /**
     * Test no spaces filter
     */
    public function testNoSpacesFilter()
    {
        $this->expectException(ParseCancellationException::class);
        $this->factory->initFilter("                                 ");
    }

    /**
     * Test no newlines filter
     */
    public function testNoNewlinesFilter()
    {
        $this->expectException(ParseCancellationException::class);
        $this->factory->initFilter("\n");
    }

    /**
     * Test formatted filter
     */
    public function testFormatted()
    {
        $filter = $this->factory->initFilter("name = 'Guillaume'\nand\ncity <> 'Bergamo'");
        $expected = new Filter(
            new Conjunction(
                new Condition("name", Operator::EQ, "Guillaume"),
                new Condition("city", Operator::NEQ, "Bergamo")
            )
        );
        $this->assertEquals($expected, $filter);
    }

    /**
     * Test skipping spaces
     */
    public function testSkippingSpaces()
    {
        $str = "       name       =      'Guillaume'       and      city    <>  'Bergamo'                             ";
        $filter1 = $this->factory->initFilter($str);
        $expected1 = new Filter(
            new Conjunction(
                new Condition("name", Operator::EQ, "Guillaume"),
                new Condition("city", Operator::NEQ, "Bergamo")
            )
        );
        $this->assertEquals($expected1, $filter1);
    }
}
