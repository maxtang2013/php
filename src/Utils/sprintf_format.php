<?php

// string  s
// integer d, u, c, o, x, X, b
// double  g, G, e, E, f, F

$type = 'monkey';
$num = 1000;
$fraction = 0.334;

$format = 'There are %d %s on the island, with %g of them are less then 3 years old.';

echo sprintf($format, $num, $type, $fraction);
echo '<br>';

// Swapping order of arguments
$location = 'island';

$format = 'The %2$s contains %1$d monkeys.
            That\'s a nice %2$s full of %1$d monkeys.';

echo sprintf($format, $num, $location);
echo '<br>';
// padding characters

echo sprintf("% 9d<br>", 123);
echo sprintf("%'09d<br>", 123);


?>
