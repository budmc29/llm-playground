# ISBN-13 Validator (PHP 8)

This is a PHP 8 implementation of an ISBN-13 validator with a simple test runner (no dependencies required).

## Requirements

- PHP 8.0 or higher

## Running Tests

Simply run the test runner:
```bash
php test_runner.php
```

## Implementation

The validator implements the official ISBN-13 checksum algorithm:
- Alternating weights of 1 and 3 for the first 12 digits
- Calculates the check digit for the 13th position
- Handles hyphen-separated ISBN formats

## Files

- `ISBN13Validator.php` - The validator class
- `test_runner.php` - Simple test runner (no external dependencies)
- `ISBN13ValidatorTest.php` - PHPUnit tests (optional, requires PHPUnit)

