<?php
    echo $_SERVER['HTTP_USER_AGENT'];
    
    foreach ($_SERVER as $key => $value) {
        echo $key . ': '. $value . '<br/>';
    }

?>

