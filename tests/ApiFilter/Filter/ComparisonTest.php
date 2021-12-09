<?php

namespace FattureInCloud\ApiFilter\Filter;

use PHPUnit\Framework\TestCase;

class ComparisonTest extends TestCase
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
        $comparison = new Comparison("city", ComparisonOperator::EQ, "Bergamo");
        $this->assertEquals("Bergamo", $comparison->getValue());

        $comparison->setValue(5);
        $this->assertEquals(5, (int)$comparison->getValue());

        $comparison->setValue(true);
        $this->assertEquals(true, (bool)$comparison->getValue());

        $comparison->setValue(false);
        $this->assertEquals(false, (bool)$comparison->getValue());
    }

    /**
     * Test field
     */
    public function testField()
    {
        $comparison = new Comparison("name", ComparisonOperator::EQ, "Bergamo");
        $this->assertEquals("name", $comparison->getField());

        $comparison->setField("city");
        $this->assertEquals("city", $comparison->getField());
    }

    /**
     * Test operator
     */
    public function testOperator()
    {
        $comparison = new Comparison("city", ComparisonOperator::EQ, "Bergamo");
        $this->assertEquals(ComparisonOperator::EQ, $comparison->getOp());

        $comparison->setOp(ComparisonOperator::GT);
        $this->assertEquals(ComparisonOperator::GT, $comparison->getOp());

        $comparison->setOp(ComparisonOperator::GTE);
        $this->assertEquals(ComparisonOperator::GTE, $comparison->getOp());

        $comparison->setOp(ComparisonOperator::LT);
        $this->assertEquals(ComparisonOperator::LT, $comparison->getOp());

        $comparison->setOp(ComparisonOperator::LTE);
        $this->assertEquals(ComparisonOperator::LTE, $comparison->getOp());

        $comparison->setOp(ComparisonOperator::NEQ);
        $this->assertEquals(ComparisonOperator::NEQ, $comparison->getOp());
    }

    /**
     * Test toString
     */
    public function testToString()
    {
        $comparison = new Comparison("city", ComparisonOperator::EQ, "Bergamo");
        $this->assertEquals("city = Bergamo", (string)$comparison);
    }
}
