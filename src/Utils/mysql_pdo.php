<?php


function testRemote() {
        $dbArray = array(
        "host"     => "169.55.57.117",//FOR DEV
        "user"     => "root",
        "password" => "fFoj84Ui2C3RoRHfTsZ",
        "port"     => "3306",
        "db"       => "openfire"
    );



    $dbConn = new \PDO('mysql:host='. $dbArray["host"] .';dbname='. $dbArray["db"] .';port='. $dbArray["port"], $dbArray["user"], $dbArray["password"], [\PDO::MYSQL_ATTR_MULTI_STATEMENTS => false]);


    // $username = preg_replace('/[^_a-zA-Z0-9]/', "", $username);
    // $password = (enmcrypt($password));
    $username = "max";
    $password = "";

    $sql = sprintf("SELECT `Name` FROM `Admins` WHERE `Name` = '%s' and `Password`= '%s'", $username, $password);
    $stmt = $dbConn->query($sql);
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($res);

}


class DBTester {
    protected $dbConn;

    public function __construct() {
        $this->dbConn= new PDO('mysql:host=127.0.0.1;dbname=freelance', "freelance", "freelance");
    }

    public function testSqlPrepared() {
        $username="max";
        $password='5\/23452U';
        $sql = "SELECT `name` FROM `user` WHERE `name` = ? and `password`= ?";
        $stmt = $this->dbConn->prepare($sql);
        $res = $stmt->execute(array($username, $password));
        $res = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        if (is_array($res) &&  count($res) > 0) {
            echo "Yes\n";
        }

        echo json_encode($res);
    }

    public function testSql() {
        $sql = "SELECT `name` FROM `user` WHERE `name` = 'max' and `password`= '5\/23452U'";
        $stmt = $this->dbConn->query($sql);
        $res = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        echo json_encode([$this->dbConn, $stmt]);

        if (is_array($res) &&  count($res) > 0) {
            echo "Yes\n";
        }

        echo json_encode($res). "\n";
    }

    //// 
    // The following test functions assume that the field startTime is of type DateTime in mysql.
    public function testDateTime() {
        $a = date( strtotime('+15 days') );
        echo json_encode($a);

        // This is good!
        $sql = "INSERT INTO `session` (`token`, `startTime`,`userId`) values('diiissd;22o', FROM_UNIXTIME(". (time() + 15*24*3600) ."), 1)";
        
        // This is good, too.
        $sql = sprintf("INSERT INTO `session` (`token`, `startTime`,`userId`) values('diiissd;22o', FROM_UNIXTIME( %d ), 1)", time() + 15*24*3600);


        $stmt = $dbConn->query($sql);
        
        if (!$stmt) {
            // Useful, should always do this to ease debugging.
            echo json_encode($dbConn->errorInfo());
        }
        echo json_encode($stmt) . "\n";
    }

    public function testDateTimeCmp() {
        $sql = sprintf("SELECT * FROM session where startTime < FROM_UNIXTIME(%d)", time());
        $stmt = $this->dbConn->query($sql);
        $res = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        foreach ($res as $r) {
            $dt = sprintf("%s", $r['startTime']);
            $dateObj = DateTime::createFromFormat("Y-m-d H:i:s", $dt);

            echo $dateObj->format("YmdH") . "\n";

            //echo $regDate . "\n";

//            echo sprintf("%s", $r['startTime']);
        }

        echo json_encode($res) . "\n";
    }
}
date_default_timezone_set("Asia/Hong_Kong");
$tester = new DBTester();
$tester->testDateTimeCmp();
