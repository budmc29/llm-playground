<?php

use PHPUnit\Framework\TestCase;

class ISBN13ValidatorTest extends TestCase
{
    public function testValidIsbnWithHyphens(): void
    {
        $this->assertTrue(
            ISBN13Validator::isValid("978-0-306-40615-7"),
            "Should return true for valid ISBN with hyphens"
        );
    }

    public function testValidIsbnWithoutHyphens(): void
    {
        $this->assertTrue(
            ISBN13Validator::isValid("9780306406157"),
            "Should return true for valid ISBN without hyphens"
        );
    }

    public function testInvalidChecksum(): void
    {
        $this->assertFalse(
            ISBN13Validator::isValid("978-0-306-40615-0"),
            "Should return false for invalid checksum"
        );
    }

    public function testInvalidLength(): void
    {
        $this->assertFalse(
            ISBN13Validator::isValid("978-0-306-40615"),
            "Should return false for invalid length"
        );
    }

    public function testContainsNonNumericCharacters(): void
    {
        $this->assertFalse(
            ISBN13Validator::isValid("978-0-306-40615-X"),
            "Should return false for non-numeric characters"
        );
    }
}

