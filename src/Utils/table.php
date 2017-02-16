<?php

    $names =     Array("Max", 'Bob', 'Alex', 'John');
    $ages   =    Array(34,     32,    18,     45);
    $countries = Array("China","NZ", "USA",  "Swiss");
    $len = 4;
    
    echo "<table border=1>";
    echo "<tr><th>Name</th><th>Age</th><th>Country</th></tr>";
    for ($i = 0; $i < 4; ++$i) {
        echo "<tr><td><span style='color:blue'>$names[$i]</span></td><td>$ages[$i]</td><td>$countries[$i]</td></tr>";
    }
    echo "</table>";
?>

