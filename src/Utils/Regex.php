<?php
echo '-------------------------\n';
echo "=-----------------\n";


$p = '/\b(0|([1-9]\d*))\b/';
$p = "/\b(0|([1-9]\d*))\b/";
preg_match($p, "00134", $match);
print_r($match);

echo '<br/>';
preg_match($p, '13445', $match);
print_r($match);
echo '<br/>';

preg_match($p, 'yiil1', $match);
print_r($match);


/* [e|a] is different from (e|a) */
echo '<br/>';
$p = '/gr[ea]y/';
$patterns = array('/gr[ea]y/', '/gr[e|a]y/', '/gr(e|a)y/');

foreach($patterns as $p) {
    echo '<br/>';
    $p1 = '<span style="color:red">'.$p.'</span>';
    if (preg_match($p, 'grey')) {
        echo $p1 . ' matches "grey"';
    } else {
        echo $p1 . ' does NOT match "grey"';
    }

    echo '<br/>';
    if (preg_match($p, 'gr|y')) {
        echo $p1 . ' matches "gr|y"';
    } else {
        echo $p1 . ' does NOT match "gr|y"';
    }
}


?>
