<?php
$orig = 'hello\tworld\n';

echo $orig . '<br/>';

$orig2 = "hello\tworld\n";
echo $orig2 . '<br/>';

$string = stripcslashes('hello\tworld\n');

echo $string;

echo '<br/>';
$a='aaaaaa';
$b='aaa';
echo substr_count($a, $b);


$text = "abc 4 5 dad 12 33 oop 42 34";
$tok = strtok($text, ' ');
while ($tok) {
    echo $tok . '<br/>';
    $tok = strtok(' ');
}

// 1. Single quoted. vs double quoted.
echo '<br/>single quoted string  v.s. double quated string<br>';
$s = 'hello\tworld\n';
$s2 = "hello\tworld\n";
echo '$s is '. $s . "<br/>";
echo '$s2 is ' . $s2 . '<br/>';

// 2. heredoc

$ls = <<< end
    This is a multi-lined string acrossing several
    lines, <br/>
    Lets see.
end;
echo $ls . '<br/>';

// 3. print_r() vs var_dump()
echo "------------------<br>";
$a = 3;
print_r($a);
echo '<br/>';
var_dump($a);

echo '<br/>';
unset($a);
print_r($a);
echo '<br/>';
var_dump($a);
echo '<br/>';

// 4. cleaning strings
echo '---------------------<br>';
$x = '  how are you ? ';
echo trim($x) . '<br/>';
echo ltrim($x) . '<br/>';
echo rtrim($x) . '<br/>';

// 5. Case changing.
echo ucfirst($x) . '<br/>';
echo ucwords($x) . '<br/>';
echo strtolower($x) . '<br/>';
echo strtoupper($x) . '<br/>';


// 6. encoding and escaping
echo "------------------------<br>";
echo '<p>';

$orig = "Einstürzende Neubauten";
$string = htmlentities("Einstürzende Neubauten");
echo $orig . "<br>";
echo $string . "<br>";
echo '</p>';

echo '--------------------------<br>';
$str = htmlspecialchars('<p>You</p>');
echo $str . "<br>";

// 7.substr
//
// 8. strcmp strncmp strcasecmp strncasecmp
$s1 = "hello";
$s2 = 'hell';

echo strcmp($s1, $s2) . '<br>';

echo strncmp($s1, $s2, strlen($s2)). '<br>';

// 9. explode() implode()
echo '----------------------<br>';
$input='hello world see you  later';
$arr = explode(' ', $input);
print_r($arr);

$s = implode(',', $arr);
echo $s;

?>

