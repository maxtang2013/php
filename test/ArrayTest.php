<?php

    $arr = array('tey', 'iidp', 'hello', 'uodd');
    $it = new ArrayIterator($arr);

    while ($item = $it->current()) {
        echo $item . "\n";
        $it->next();
    }

    foreach ($it as $item) {
        echo $item . "\n";
    }

    
