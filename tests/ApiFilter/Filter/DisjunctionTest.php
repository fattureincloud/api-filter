<?php

namespace FattureInCloud\ApiFilter\Filter;

use PHPUnit\Framework\TestCase;

class DisjunctionTest extends TestCase
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
    public function testComparisons()
    {
        $left = new Comparison("city", Operator::EQ, "Bergamo");
        $right = new Comparison("age", Operator::LT, 30);
        $disjunction = new Disjunction($left, $right);
        $this->assertEquals($left, $disjunction->getLeft());
        $this->assertEquals($right, $disjunction->getRight());

        $left2 = new Comparison("state", Operator::NEQ, "USA");
        $disjunction->setLeft($left2);
        $this->assertEquals($left2, $disjunction->getLeft());
        $this->assertEquals($right, $disjunction->getRight());

        $right2 = new Comparison("is_single", Operator::EQ, true);
        $disjunction->setRight($right2);
        $this->assertEquals($left2, $disjunction->getLeft());
        $this->assertEquals($right2, $disjunction->getRight());
    }

    /**
     * Test toString
     */
    public function testToString()
    {
        $left = new Comparison("city", Operator::EQ, "Bergamo");
        $right = new Comparison("age", Operator::LT, 30);
        $disjunction = new Disjunction($left, $right);
        $this->assertEquals("DISJUNCTION{ city = Bergamo, age < 30 }", (string)$disjunction);
    }
}
