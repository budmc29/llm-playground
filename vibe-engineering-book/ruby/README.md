# ISBN-13 Validator (Ruby)

This is a Ruby implementation of an ISBN-13 validator using Minitest for testing.

## Requirements

- Ruby

## Running Tests

Simply run the test file:
```bash
ruby isbn13_validator_test.rb
```

## Implementation

The validator implements the official ISBN-13 checksum algorithm:
- Alternating weights of 1 and 3 for the first 12 digits
- Calculates the check digit for the 13th position
- Handles hyphen-separated ISBN formats

## Files

- `isbn13_validator.rb` - The validator function
- `isbn13_validator_test.rb` - Minitest test suite

