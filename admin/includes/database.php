
<?php
require_once("config.php");


class Database {

    public $connection; //Keep it public, not private

    function __construct(){

        $this -> open_db_connection();
    }


    public function open_db_connection() {

        // $this->connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME); //Procedural way
        $this->connection = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME); //OOP way


             /* Check connection*/   

        // if (mysqli_connect_errno()) { - using OOP now and calling object's methods
            if($this->connection->connect_errno) { //returns an error code

                // die("Connect failed: ". mysqli_connect_error());
                die("Connect failed: ". $this->connection->connect_error); //Returns a string description of the last error

                exit();
        }
        
            /* Return name of current default database */
        /*  if ($result = $this->connection->query("SELECT DATABASE()")) {
                $row = $result->fetch_row();
                printf("Default database is %s.\n", $row[0]);
                $result->close();

            //If connectivity problems, cause the port was changed to 3307
            // $connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME,'3307','/Applications/XAMPP/xamppfiles/var/mysql/mysql.sock');
            // $dbconn = new mysqli('localhost:3307', "your username","your password", "your database name");
        } */
    }

    public function query($sql) {
        // $result = mysqli_query($this->connection, $sql); //Procedural way
        $result = $this->connection->query($sql); //OOP way
     
        $this->confirm_query($result);
        return $result;
    }


    private function confirm_query($result) {
        if(!$result) {
            // die("DB Query failed" . mysqli_error($this->connection));
            die("DB Query failed" . $this->connection->error); //Returns a string description of the last error
        }
    }

    public function escape_string($string){
        // $escaped_string = mysqli_real_escape_string($this-> connection, $string);
        $escaped_string = $this->connection->real_escape_string($string); //Escapes special characters in a string for use in an SQL statement

        return $escaped_string;
    }


    public function the_insert_id() {
        // return mysqli_insert_id($this->connection); 
        return $this->connection->insert_id; //Returns the auto generated id used in the latest query
    }
}

$database = new Database();

?>