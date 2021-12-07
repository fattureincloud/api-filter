<?php

namespace FattureInCloud\ApiFilter\Filter;

use PHPUnit\Framework\TestCase;

class EmptyFieldTest extends TestCase
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
     * Test field
     */
    public function testField()
    {
        $empty = new EmptyField("name");
        $this->assertEquals("name", $empty->getField());

        $empty->setField("city");
        $this->assertEquals("city", $empty->getField());
    }

    /**
     * Test toString
     */
    public function testToString()
    {
        $empty = new EmptyField("city");
        $this->assertEquals("city = NULL", (string)$empty);
    }
}
