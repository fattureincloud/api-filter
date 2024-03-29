<?php

namespace FattureInCloud\ApiFilter\Filter;

use PHPUnit\Framework\TestCase;

class ConditionTest extends TestCase
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
        $condition = new Condition("city", Operator::EQ, "Bergamo");
        $this->assertEquals("Bergamo", $condition->getValue());

        $condition->setValue(5);
        $this->assertEquals(5, (int)$condition->getValue());

        $condition->setValue(true);
        $this->assertEquals(true, (bool)$condition->getValue());

        $condition->setValue(false);
        $this->assertEquals(false, (bool)$condition->getValue());

        $condition->setValue(null);
        $this->assertEquals(null, $condition->getValue());
    }

    /**
     * Test field
     */
    public function testField()
    {
        $condition = new Condition("name", Operator::EQ, "Bergamo");
        $this->assertEquals("name", $condition->getField());

        $condition->setField("city");
        $this->assertEquals("city", $condition->getField());
    }

    /**
     * Test operator
     */
    public function testOperator()
    {
        $condition = new Condition("city", Operator::EQ, "Bergamo");
        $this->assertEquals(Operator::EQ, $condition->getOp());

        $condition->setOp(Operator::GT);
        $this->assertEquals(Operator::GT, $condition->getOp());

        $condition->setOp(Operator::GTE);
        $this->assertEquals(Operator::GTE, $condition->getOp());

        $condition->setOp(Operator::LT);
        $this->assertEquals(Operator::LT, $condition->getOp());

        $condition->setOp(Operator::LTE);
        $this->assertEquals(Operator::LTE, $condition->getOp());

        $condition->setOp(Operator::NEQ);
        $this->assertEquals(Operator::NEQ, $condition->getOp());

        $condition->setOp(Operator::LIKE);
        $this->assertEquals(Operator::LIKE, $condition->getOp());

        $condition->setOp(Operator::CONTAINS);
        $this->assertEquals(Operator::CONTAINS, $condition->getOp());

        $condition->setOp(Operator::NOT_LIKE);
        $this->assertEquals(Operator::NOT_LIKE, $condition->getOp());

        $condition->setOp(Operator::NOT_CONTAINS);
        $this->assertEquals(Operator::NOT_CONTAINS, $condition->getOp());

        $condition->setOp(Operator::STARTS_WITH);
        $this->assertEquals(Operator::STARTS_WITH, $condition->getOp());

        $condition->setOp(Operator::ENDS_WITH);
        $this->assertEquals(Operator::ENDS_WITH, $condition->getOp());
    }

    /**
     * Test toString
     */
    public function testToString()
    {
        $condition = new Condition("city", Operator::EQ, "Bergamo");
        $this->assertEquals("city = Bergamo", (string)$condition);

        $condition = new Condition("city", Operator::NEQ, null);
        $this->assertEquals("city <> null", (string)$condition);

        $condition = new Condition("city", Operator::LIKE, "%aco");
        $this->assertEquals("city like %aco", (string)$condition);

        $condition = new Condition("city", Operator::NOT_LIKE, "%aco");
        $this->assertEquals("city not like %aco", (string)$condition);
    }
}
