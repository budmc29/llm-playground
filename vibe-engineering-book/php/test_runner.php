<?php

require_once __DIR__ . '/ISBN13Validator.php';

class SimpleTestRunner
{
    private static $tests_run = 0;
    private static $tests_passed = 0;
    private static $tests_failed = 0;

    public static function run()
    {
        echo "Running ISBN-13 Validator Tests\n";
        echo "================================\n\n";

        self::test("valid_isbn_with_hyphens", function() {
            return ISBN13Validator::isValid("978-0-306-40615-7");
        }, true, "Should return true for valid ISBN with hyphens");

        self::test("valid_isbn_without_hyphens", function() {
            return ISBN13Validator::isValid("9780306406157");
        }, true, "Should return true for valid ISBN without hyphens");

        self::test("invalid_checksum", function() {
            return ISBN13Validator::isValid("978-0-306-40615-0");
        }, false, "Should return false for invalid checksum");

        self::test("invalid_length", function() {
            return ISBN13Validator::isValid("978-0-306-40615");
        }, false, "Should return false for invalid length");

        self::test("contains_non_numeric_characters", function() {
            return ISBN13Validator::isValid("978-0-306-40615-X");
        }, false, "Should return false for non-numeric characters");

        echo "\n================================\n";
        echo "Tests run: " . self::$tests_run . "\n";
        echo "Passed: " . self::$tests_passed . "\n";
        echo "Failed: " . self::$tests_failed . "\n";

        return self::$tests_failed === 0;
    }

    private static function test($name, $callback, $expected, $message = "")
    {
        self::$tests_run++;
        $result = $callback();
        
        if ($result === $expected) {
            self::$tests_passed++;
            echo "✓ $name: PASSED\n";
            return true;
        } else {
            self::$tests_failed++;
            echo "✗ $name: FAILED - $message\n";
            echo "  Expected: " . ($expected ? 'true' : 'false') . ", Got: " . ($result ? 'true' : 'false') . "\n";
            return false;
        }
    }
}

// Run the tests
$success = SimpleTestRunner::run();

// Exit with appropriate code
exit($success ? 0 : 1);

