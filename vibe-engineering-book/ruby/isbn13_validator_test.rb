require 'minitest/autorun'
require_relative 'isbn13_validator'

class ISBN13ValidatorTest < Minitest::Test
  def test_valid_isbn_with_hyphens
    assert is_valid_isbn13("978-0-306-40615-7"), "Should return true for valid ISBN with hyphens"
  end

  def test_valid_isbn_without_hyphens
    assert is_valid_isbn13("9780306406157"), "Should return true for valid ISBN without hyphens"
  end

  def test_invalid_checksum
    refute is_valid_isbn13("978-0-306-40615-0"), "Should return false for invalid checksum"
  end

  def test_invalid_length
    refute is_valid_isbn13("978-0-306-40615"), "Should return false for invalid length"
  end

  def test_contains_non_numeric_characters
    refute is_valid_isbn13("978-0-306-40615-X"), "Should return false for non-numeric characters"
  end
end

