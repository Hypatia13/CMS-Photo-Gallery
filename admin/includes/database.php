
<?php
require_once("config.php");


class Database {

    public $connection;

    function __construct(){

        $this -> open_db_connection();
    }


    public function open_db_connection() {

        $this->connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

        /* check connection*/   
        if (mysqli_connect_errno()) {
            die("Connect failed: ". mysqli_connect_error());
            exit();
        }
        
        /* return name of current default database */
 /*         if ($result = $this->connection->query("SELECT DATABASE()")) {
                $row = $result->fetch_row();
                printf("Default database is %s.\n", $row[0]);
                $result->close();

            //If connectivity problems, cause the port was changed to 3307
            // $connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME,'3307','/Applications/XAMPP/xamppfiles/var/mysql/mysql.sock');
            // $dbconn = new mysqli('localhost:3307', "your username","your password", "your database name");
        } */
    }

    public function query($sql) {
        $result = mysqli_query($this->connection, $sql);
     
        return $result;
    }


    private function confirm_query($result) {
        if(!$result) {
            die("DB Query failed");
        }
    }

    public function escape_string($string){
        $escaped_string = mysqli_real_escape_string($this-> connection, $string);
        return $escaped_string;
    }
}

$database = new Database();

?>