<?php

declare(strict_types=1);

namespace FattureInCloud\ApiFilter;

use FattureInCloud\ApiFilter\Filter\Condition;
use FattureInCloud\ApiFilter\Filter\Conjunction;
use FattureInCloud\ApiFilter\Filter\Disjunction;
use FattureInCloud\ApiFilter\Filter\Filter;
use FattureInCloud\ApiFilter\Filter\Negation;
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
        $filter1 = $this->factory->initFilter("name like true");
        $expected1 = new Filter(new Condition("name", Operator::LIKE, true));
        $this->assertEquals($expected1, $filter1);

        $filter2 = $this->factory->initFilter("name LIKE true");
        $expected2 = new Filter(new Condition("name", Operator::LIKE, true));
        $this->assertEquals($expected2, $filter2);
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

        $filter6 = $this->factory->initFilter("x = true");
        $expected6 = new Filter(new Condition("x", Operator::EQ, true));
        $this->assertEquals($expected6, $filter6);
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
     * Test no missing quotation
     */
    public function testNoMissingLeftQuotation()
    {
        $this->expectException(ParseCancellationException::class);
        $this->factory->initFilter("name = cooper'");
    }

    /**
     * Test no missing quotation
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
     * Test negation
     */
    public function testNegation()
    {
        $filter1 = $this->factory->initFilter("not name = 'Guillaume'");
        $expected1 = new Filter(new Negation(new Condition("name", Operator::EQ, "Guillaume")));
        $this->assertEquals($expected1, $filter1);

        $filter2 = $this->factory->initFilter("NOT name = 'Guillaume'");
        $expected2 = new Filter(new Negation(new Condition("name", Operator::EQ, "Guillaume")));
        $this->assertEquals($expected2, $filter2);

        $filter3 = $this->factory->initFilter("not (name = 'Guillaume')");
        $expected3 = new Filter(new Negation(new Condition("name", Operator::EQ, "Guillaume")));
        $this->assertEquals($expected3, $filter3);

        $filter4 = $this->factory->initFilter("(not name = 'Guillaume')");
        $expected4 = new Filter(new Negation(new Condition("name", Operator::EQ, "Guillaume")));
        $this->assertEquals($expected4, $filter4);

        $this->expectException(ParseCancellationException::class);
        $this->factory->initFilter("not = 'Guillaume'");
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
        $filter1 = $this->factory->initFilter("name = 'Guillaume' and (not city = 'Bergamo' or company <> 'FIC')");
        $expected1 = new Filter(
            new Conjunction(
                new Condition("name", Operator::EQ, "Guillaume"),
                new Disjunction(
                    new Negation(
                        new Condition("city", Operator::EQ, "Bergamo")
                    ),
                    new Condition("company", Operator::NEQ, "FIC")
                )
            )
        );
        $this->assertEquals($expected1, $filter1);

        $filter2 = $this->factory->initFilter("name = 'Guillaume' and not (city = 'Bergamo' or company <> 'FIC')");
        $expected2 = new Filter(
            new Conjunction(
                new Condition("name", Operator::EQ, "Guillaume"),
                new Negation(
                    new Disjunction(
                        new Condition("city", Operator::EQ, "Bergamo"),
                        new Condition("company", Operator::NEQ, "FIC")
                    )
                )
            )
        );
        $this->assertEquals($expected2, $filter2);

        $filter3 = $this->factory->initFilter("(name = 'Guillaume' and not city = 'Bergamo' or company <> 'FIC')");
        $expected3 = new Filter(
            new Disjunction(
                new Conjunction(
                    new Condition("name", Operator::EQ, "Guillaume"),
                    new Negation(
                        new Condition("city", Operator::EQ, "Bergamo")
                    )
                ),
                new Condition("company", Operator::NEQ, "FIC")
            )
        );
        $this->assertEquals($expected3, $filter3);

        $filter4 = $this->factory->initFilter("(name = 'Guillaume' and not city = 'Bergamo') or company <> 'FIC'");
        $expected4 = new Filter(
            new Disjunction(
                new Conjunction(
                    new Condition("name", Operator::EQ, "Guillaume"),
                    new Negation(
                        new Condition("city", Operator::EQ, "Bergamo")
                    )
                ),
                new Condition("company", Operator::NEQ, "FIC")
            )
        );
        $this->assertEquals($expected4, $filter4);

        $filter5 = $this->factory->initFilter("not (name = 'Guillaume' and not city = 'Bergamo') or company <> 'FIC'");
        $expected5 = new Filter(
            new Disjunction(
                new Negation(
                    new Conjunction(
                        new Condition("name", Operator::EQ, "Guillaume"),
                        new Negation(
                            new Condition("city", Operator::EQ, "Bergamo")
                        )
                    )
                ),
                new Condition("company", Operator::NEQ, "FIC")
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
