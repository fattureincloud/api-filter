<?php

namespace FattureInCloud\ApiFilter\Filter;

use PHPUnit\Framework\TestCase;

class FilledFieldTest extends TestCase
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
        $filled = new FilledField("name");
        $this->assertEquals("name", $filled->getField());

        $filled->setField("city");
        $this->assertEquals("city", $filled->getField());
    }

    /**
     * Test toString
     */
    public function testToString()
    {
        $filled = new FilledField("city");
        $this->assertEquals("city <> NULL", (string)$filled);
    }
}
