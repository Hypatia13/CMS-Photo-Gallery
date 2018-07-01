<?php
//Database Connection Constants

define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','gallery_db');

// $servName = "localhost:3307";
$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

//To check the connection
if ($connection) {
    echo "true";
}

    //If connectivity problems, cause the port was changed to 3307
// $connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME,'3307','/Applications/XAMPP/xamppfiles/var/mysql/mysql.sock');
// $dbconn = new mysqli('localhost:3307', /*your username*/, /*your password*/, /*your database name*/);
?>