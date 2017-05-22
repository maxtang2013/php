<?php
    // $servername = "localhost";
    $servername = '127.0.0.1';
    $username = 'max';
    $password = 'Twf120406';
    $dbname = 'trademe';

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully.<br>";

    // $sql = "SELECT id, name FROM user";
    // $result = $conn->query($sql);

    // $teddy = "teddy";
    // $teddy_exist = false;

    // if ($result->num_rows > 0) {
    //     // output data of each row
    //     while ($row = $result->fetch_assoc()) {
    //         echo "id: " . $row['id']. " name: " . $row['name'] . "<br>";
    //         if ($teddy == $row['name']) {
    //             $teddy = true;
    //         }
    //     }

    // } else {
    //     echo '0 results.';
    // }


    // if (!$teddy_exist) {
    //     $sql = 'INSERT INTO user (id, name) VALUES("82018", "teddy")';
    //     if( $conn->query($sql) === TRUE ) {
    //         echo '<br> Inserted information about teddy successfully!';
    //     } 
    // }


    $sql = "SELECT * from `contracts` where id = 1";
    $res = $conn->query($sql);

    if ($res->num_rows > 0) {
        $row = $res->fetch_assoc();

        var_dump( $row['testDateTime'] );

        $objDateTime = new DateTime('NOW');
        $str = $objDateTime->format('Y-m-d H:i:s');

        var_dump( $str );
        
        if ($row['testDateTime'] > $str) {
            echo "OK!";
        }
    }

    $conn->close();

?>
