<?php

class ISBN13Validator
{
    /**
     * Validates a 13-digit ISBN based on the official checksum algorithm.
     * 
     * @param string $isbn_string The ISBN string to validate
     * @return bool True if valid, false otherwise
     */
    public static function isValid(string $isbn_string): bool
    {
        // Remove hyphens from the input string
        $cleaned_isbn = str_replace('-', '', $isbn_string);
        
        // Check if the length is exactly 13 characters
        if (strlen($cleaned_isbn) !== 13) {
            return false;
        }
        
        // Check if all characters are digits
        if (!preg_match('/^\d+$/', $cleaned_isbn)) {
            return false;
        }
        
        // Extract the check digit (last character)
        $check_digit = (int) $cleaned_isbn[12];
        
        // Calculate the weighted sum for the first 12 digits
        // Weights alternate: 1 for even positions (0, 2, 4...), 3 for odd positions (1, 3, 5...)
        $sum = 0;
        for ($i = 0; $i < 12; $i++) {
            $digit = (int) $cleaned_isbn[$i];
            $weight = ($i % 2 == 0) ? 1 : 3;
            $sum += $digit * $weight;
        }
        
        // Calculate expected check digit
        // Check digit is chosen so that (sum + check_digit) % 10 == 0
        $expected_check_digit = (10 - ($sum % 10)) % 10;
        
        // Compare calculated check digit with the provided check digit
        return $check_digit === $expected_check_digit;
    }
}

