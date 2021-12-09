<?php

namespace FattureInCloud\ApiFilter\Filter;

use PHPUnit\Framework\TestCase;

class PatternTest extends TestCase
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
    public function testValue()
    {
        $like = new Pattern("city", PatternOperator::LIKE, "%ergam%");
        $this->assertEquals("%ergam%", $like->getValue());

        $like->setValue("%ancouve%");
        $this->assertEquals("%ancouve%", $like->getValue());
    }

    /**
     * Test field
     */
    public function testField()
    {
        $comparison = new Pattern("name", PatternOperator::LIKE, "%ergam%");
        $this->assertEquals("name", $comparison->getField());

        $comparison->setField("city");
        $this->assertEquals("city", $comparison->getField());
    }

    /**
     * Test operator
     */
    public function testOperator()
    {
        $pattern = new Pattern("city", PatternOperator::LIKE, "%ergam%");
        $this->assertEquals(PatternOperator::LIKE, $pattern->getOp());

        $pattern->setOp(PatternOperator::CONTAINS);
        $this->assertEquals(PatternOperator::CONTAINS, $pattern->getOp());

        $pattern->setOp(PatternOperator::STARTS_WITH);
        $this->assertEquals(PatternOperator::STARTS_WITH, $pattern->getOp());

        $pattern->setOp(PatternOperator::ENDS_WITH);
        $this->assertEquals(PatternOperator::ENDS_WITH, $pattern->getOp());
    }

    /**
     * Test toString
     */
    public function testToString()
    {
        $pattern = new Pattern("city", PatternOperator::LIKE, "%ergam%");
        $this->assertEquals("city like %ergam%", (string)$pattern);
    }
}
