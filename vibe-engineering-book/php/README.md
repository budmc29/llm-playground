# ISBN-13 Validator (PHP 8)

This is a PHP 8 implementation of an ISBN-13 validator using PHPUnit for testing.

## Requirements

- PHP 8.0 or higher
- Composer

## Setup

1. Install dependencies:
```bash
composer install
```

## Running Tests

```bash
vendor/bin/phpunit
```

## Implementation

The validator implements the official ISBN-13 checksum algorithm:
- Alternating weights of 1 and 3 for the first 12 digits
- Calculates the check digit for the 13th position
- Handles hyphen-separated ISBN formats

