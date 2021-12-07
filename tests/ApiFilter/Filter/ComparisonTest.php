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
        $comparison = new Comparison("city", Operator::EQ, "Bergamo");
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
        $comparison = new Comparison("name", Operator::EQ, "Bergamo");
        $this->assertEquals("name", $comparison->getField());

        $comparison->setField("city");
        $this->assertEquals("city", $comparison->getField());
    }

    /**
     * Test operator
     */
    public function testOperator()
    {
        $comparison = new Comparison("city", Operator::EQ, "Bergamo");
        $this->assertEquals(Operator::EQ, $comparison->getOp());

        $comparison->setOp(Operator::GT);
        $this->assertEquals(Operator::GT, $comparison->getOp());

        $comparison->setOp(Operator::GTE);
        $this->assertEquals(Operator::GTE, $comparison->getOp());

        $comparison->setOp(Operator::LT);
        $this->assertEquals(Operator::LT, $comparison->getOp());

        $comparison->setOp(Operator::LTE);
        $this->assertEquals(Operator::LTE, $comparison->getOp());

        $comparison->setOp(Operator::NEQ);
        $this->assertEquals(Operator::NEQ, $comparison->getOp());

        $comparison->setOp(Operator::LIKE);
        $this->assertEquals(Operator::LIKE, $comparison->getOp());
    }

    /**
     * Test toString
     */
    public function testToString()
    {
        $comparison = new Comparison("city", Operator::EQ, "Bergamo");
        $this->assertEquals("city = Bergamo", (string)$comparison);
    }
}
