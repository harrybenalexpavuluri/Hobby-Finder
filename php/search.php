<?php
   include("config.php");
    if($_SERVER["REQUEST_METHOD"] == "POST") {
     
      $mysearch = mysqli_real_escape_string($db,$_POST['search']);
        $sql = "SELECT activity FROM activities WHERE activity = '$mysearch'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
       $sql1="insert into popular_searches(activity) values('$mysearch');";
       mysqli_query($db,$sql1);
        //mysqli_query($db, "INSERT INTO 'popu' VALUES ('$mysearch')");
          header("location: indoor.php");
      }
           
      else {
         $error = "Your Login Name or Password is invalid";
        
         echo '<script>';
         echo 'alert("Invalid search!Try again");';
         echo 'location.href="#"';
         echo '</script>';
      }
   }
?>