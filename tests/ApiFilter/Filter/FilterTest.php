<?php

namespace FattureInCloud\ApiFilter\Filter;

use PHPUnit\Framework\TestCase;

class FilterTest extends TestCase
{
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
     * Test value
     */
    public function testExpression()
    {
        $condition = new Condition("city", Operator::EQ, "Bergamo");
        $filter = new Filter($condition);
        $this->assertEquals($condition, $filter->getExpression());

        $condition2 = new Condition("vacation", Operator::EQ, "Martinica");
        $filter->setExpression($condition2);
        $this->assertEquals($condition2, $filter->getExpression());
    }

    /**
     * Test toString
     */
    public function testToString()
    {
        $condition = new Condition("city", Operator::EQ, "Bergamo");
        $filter = new Filter($condition);
        $this->assertEquals("FILTER{ city = Bergamo }", (string)$filter);
    }
}
