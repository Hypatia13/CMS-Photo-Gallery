<div class="container-fluid">

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Blank Page
            <small>Subheading</small>
        </h1>

        <?php
         /*      //Testing DB query method
            $sql = "SELECT * FROM users WHERE id=1";
            $result = $database->query($sql);
            $user_found = mysqli_fetch_array($result);
            echo $user_found['username']; 
        */
        

             // Find all users
       
          // Old way 
      
       /* // $user = new User(); - Instead of instantiating the object, will use static method instead

        $result_set = User::find_all_users();
        
        // echo $result_set[0]; 
        //Returns "Cannot use object of type mysqli_result as array", unless converting to an array first
        
        while($row = mysqli_fetch_array($result_set)) { //Fetch a result row as an associative/numeric array
            echo $row['username'] . "<br>";
        } */
       

        // New way using auto-instantiation
        /* $users = User::find_all_users();

        foreach ($users as $user) {
            echo $user -> last_name . "<br>";
        } */

            // Find a user by id
         
       // Old way 

        $found_user = User::find_user_by_id(3);

        // echo $found_user['first_name']; 
        //getting a certain value from an array, but need to assign array values to object properties instead
        
        $user = User::instantiation($found_user);
        echo $user -> first_name;


        // New way using auto-instantiation
       /*  $found_user = User::find_user_by_id(3);
        echo $found_user -> username; */



        ?>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-file"></i> Blank Page
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->

</div>
<!-- /.container-fluid -->