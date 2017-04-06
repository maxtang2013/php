<?php

    function boolToStr($b) {
        return $b ? "True" : "False";
    }

    $first = array('1','ab','raw', NULL, True, False);
    $second = array(1,0,'raw1', '', 1, 0);
    

    for($i=0; $i<5; ++$i) {
        $a = $first[$i];
        $b = $second[$i];

        echo 'Test for:';
        var_dump($a); echo '---';var_dump($b); echo '<br>';

        echo '$a===$b:', boolToStr( $a === $b ), '<br/>'."\n";

        echo '$a==$b:', boolToStr($a == $b), '<br/>'."\n";

        echo '$a!==$b:', boolToStr($a !== $b), '<br/>'."\n";

        echo '$a != $b:', boolToStr($a != $b), '<br/>'."\n";
        echo '<br/>'."\n";
    }


?>
