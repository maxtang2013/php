print "Enter a temperature (e.g., 32F, 100C):\n"; 
$input = <STDIN>; # This reads one line from the user. 
chomp($input); # This removes the ending newline from $input.

if ($input =~  m/^((?:[-+]?[0-9]+)(?:.[0-9]+)?) *([CF])$/i)
{
	# If we get in here, we had a match. $1 is the number, $2 is "C" or "F". 
	$InputNum = $1; # Save to named variables to make the ... 
	$type = $2; # ... rest of the program easier to read.
	if ($type eq "C" or $type eq "c") { # ‘eq’ tests if two strings are equal # The input was Celsius, so calculate Fahrenheit
		$celsius = $InputNum;
		$fahrenheit = ($celsius * 9 / 5) + 32;
	} else {
		# If not "C", it must be an "F", so calculate Celsius
		$fahrenheit = $InputNum;
		$celsius = ($fahrenheit - 32) * 5 / 9;
	}
	# At this point we have both temperatures, so display the results:
	printf "%.2fC is %.2fF\n", $celsius, $fahrenheit;
} else {
	# The initial regex did not match, so issue a warning.
	print "Expecting a number followed by \"C\" or \"F\",\n"; 
	print "so I don’t understand \"$input\".\n";
}
