<?php

class User {

    public $id;
    public $username;
    public $password;    
    public $first_name;
    public $last_name;

    public static function find_all_users() {
      /*   global $database;
        $result_set = $database->query("SELECT * FROM users"); //Replace with a universal query instead */

        return self::find_this_query("SELECT * FROM users");
    }

    //Very unsecure way! Need to use prepared statements instead!!!
    public static function find_user_by_id($user_id) {
       /*  global $database;
        $result_set = $database->query("SELECT * FROM users WHERE id = $user_id LIMIT 1"); */

        $result_set = self::find_this_query("SELECT * FROM users WHERE id = $user_id LIMIT 1");
        $found_user = mysqli_fetch_array($result_set); //Fetch a result row as an associative/numeric array
        return $found_user; //An associative array (key-value pairs)
    }

        //A universal query
    public static function find_this_query($sql) {
        global $database;
        $result_set = $database->query($sql);

        $the_object_array = array(); //An empty array with objects

        while ($row = mysqli_fetch_array($result_set)){
            $the_object_array[] = self::instantiation($row); //Putting in objects with properties - e.g $the_object[id]=id;
        }

        return $the_object_array;
    }

    //A bit unclear still
    public static function instantiation($the_record) { //$the_record === $the_found_user
        $the_object = new self; //?????

            // Do instantiation with an array instead
        /* $the_object -> id = $found_user['id'];
        $the_object -> username = $found_user['username'];
        $the_object -> password = $found_user['password'];
        $the_object -> first_name = $found_user['first_name'];
        $the_object -> last_name = $found_user['last_name']; */

            //Loop through $the_record & use columns/values & assign them to keys/values in an array
        foreach ($the_record as $property => $value) { //as: $key=>value pairs from an array
            if($the_object->has_the_property($property)) { //if object has the same property, as an array's key 
                $the_object->property = $value; //Assign a value from an array to an object's property
            }
        }
        return $the_object;
    }

    private function has_the_property($property) {
        $object_properties = get_object_vars($this); //Returns all object's properties in an array
        return array_key_exists($property, $object_properties); //Check for a property inside of an array
    }

}

?>