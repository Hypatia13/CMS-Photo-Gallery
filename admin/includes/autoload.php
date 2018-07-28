<?php

function __autoload($class) {
    $class = strtolower($class); //not necessary, but makes it universal

    $the_path = "includes/{$class}.php";

    if(file_exists($the_path)) {
        require_once($the_path);
    }
    else {
        die("The file named {$class}.php was not found, dude");
    }
}
?>