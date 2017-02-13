<?php

$url = 'http://www.w3resource.com/php-exercises/php-basic-exercises.php?name=\'tod\'&order=\'1\'';

$comps = parse_url($url);

$path = $comps['path'];

print_r($comps);
echo '<br/>';
print_r($path);

$idx = strrpos($path, '.');

if (!isset($idx)) {
    $idx = strrpos($path, '/');
}

echo substr($path, $idx + 1);

?>

