def is_valid_isbn13(isbn_string)
  # Remove hyphens from the input string
  cleaned_isbn = isbn_string.gsub('-', '')
  
  # Check if the length is exactly 13 characters
  return false unless cleaned_isbn.length == 13
  
  # Check if all characters are digits
  return false unless cleaned_isbn.match?(/^\d+$/)
  
  # Extract the check digit (last character)
  check_digit = cleaned_isbn[-1].to_i
  
  # Calculate the weighted sum for the first 12 digits
  # Weights alternate: 1 for even positions (0, 2, 4...), 3 for odd positions (1, 3, 5...)
  sum = 0
  12.times do |i|
    digit = cleaned_isbn[i].to_i
    weight = (i % 2 == 0) ? 1 : 3
    sum += digit * weight
  end
  
  # Calculate expected check digit
  # Check digit is chosen so that (sum + check_digit) % 10 == 0
  expected_check_digit = (10 - (sum % 10)) % 10
  
  # Compare calculated check digit with the provided check digit
  return check_digit == expected_check_digit
end

