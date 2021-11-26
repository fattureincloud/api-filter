<?php

namespace FattureInCloud\ApiFilter\Filter;

use PHPUnit\Framework\TestCase;

class ConjunctionTest extends TestCase
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
     * Test conditions
     */
    public function testConditions()
    {
        $left = new Condition("city", Operator::EQ, "Bergamo");
        $right = new Condition("age", Operator::LT, 30);
        $conjunction = new Conjunction($left, $right);
        $this->assertEquals($left, $conjunction->getLeft());
        $this->assertEquals($right, $conjunction->getRight());

        $left2 = new Condition("state", Operator::NEQ, "USA");
        $conjunction->setLeft($left2);
        $this->assertEquals($left2, $conjunction->getLeft());
        $this->assertEquals($right, $conjunction->getRight());

        $right2 = new Condition("is_single", Operator::EQ, true);
        $conjunction->setRight($right2);
        $this->assertEquals($left2, $conjunction->getLeft());
        $this->assertEquals($right2, $conjunction->getRight());
    }

    /**
     * Test toString
     */
    public function testToString()
    {
        $left = new Condition("city", Operator::EQ, "Bergamo");
        $right = new Condition("age", Operator::LT, 30);
        $conjunction = new Conjunction($left, $right);
        $this->assertEquals("CONJUNCTION{ city = Bergamo, age < 30 }", (string)$conjunction);
    }
}
