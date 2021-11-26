<?php

namespace FattureInCloud\ApiFilter\Filter;

use PHPUnit\Framework\TestCase;

class NegationTest extends TestCase
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
     * Test negated
     */
    public function testNegated()
    {
        $condition = new Condition("city", Operator::EQ, "Bergamo");
        $negation = new Negation($condition);
        $this->assertEquals($condition, $negation->getNegated());

        $condition2 = new Condition("name", Operator::NEQ, "Penny");
        $negation->setNegated($condition2);
        $this->assertEquals($condition2, $negation->getNegated());
    }

    /**
     * Test toString
     */
    public function testToString()
    {
        $condition = new Condition("city", Operator::EQ, "Bergamo");
        $negation = new Negation($condition);
        $this->assertEquals("NEGATION{ city = Bergamo }", (string)$negation);
    }
}
