<?php

// echo filemtime($_SERVER['PHP_SELF']);
$tm = filemtime(__FILE__);
date_default_timezone_set('Etc/GMT-8');
$dt = date('m-d-Y H:i:s', $tm);
echo $dt;

$f = fopen(__FILE__, 'r');
while ($line = fgets($f)) {
    echo $line . '<br/>';
}

?>
