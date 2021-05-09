<?php
 // include_once 'config.php';
    include('session.php');

$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);   

//session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
         	
      $myreview = mysqli_real_escape_string($db,$_POST['review']);
          
      $sql = "insert into reviews values('$login_session','$myreview','sports class')";
       mysqli_query($db,$sql);
      //$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
   }
?>

<!DOCTYPE html>
<html>
  <head>
    <style>
      #map {
        height: 400px;
        width: 100%;
       }
    </style>
  </head>
  <body>
  <?php include 'header.php';?>
    <h3></h3>
    <div id="map"></div>
    <script>
      function initMap() {
        var uluru = {lat: 78.487613, lng: 17.391245};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
    <script async defer
 src= "https://maps.googleapis.com/maps/api/js?key=AIzaSyDLEdGJjSaGSDPLqYhxCxEcqoQiaq8XCmM&callback=initMap">    
</script>
 
 <body   class="form-inline" >
 
 </br></br></br></br>
      
    <p> adress:
    
    
    
    phone:  
      
      
      
      
      
      
      <?php 
      include_once 'config.php';

$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);


//if($_SERVER["REQUEST_METHOD"] == "POST") {

$sql="select username,review from reviews where class_name='sports class'";
$result = mysqli_query($db,$sql);
      ?>
     
          <div class="row">
      <div class="col-md-1">
      </div>
      <div class=col-md-10">
     
    <div class="media">
    <div class="media-left media-midle">
      <?php 
    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
    {   ?>
      <img src="../images/person.png" class="media-object" style="width:75px">
   <br>
    <?php
 }?>
    </div>
    <div class="media-body">
          <h4 class="media-heading">
          <?php 
         
         
          
          $db1 = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
          
          
          //if($_SERVER["REQUEST_METHOD"] == "POST") {
          
          $sql1="select username,review from reviews where class_name='sports class'";
          $result1 = mysqli_query($db1,$sql1);
          
    while($row = mysqli_fetch_array($result1,MYSQLI_ASSOC))
    {
    	echo '<h4>'.$row["username"].'<h4>';
    	
      	   

    ?></h4>
    
      <p><?php 
      echo $row["review"];
     echo "</br></br><br>";
    }
    ?>
    </p>
    </div>
  </div>
  </div>
  </div>
          
                
                        <!-- form -->
                        
 <div class="row">
<div class="col-md-8">
  <center>  <form class="form_edit" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="action" value="submit">
 
                      </br>
                      
                            <div class="form-group">
                            <textarea id="review" name="review" class="form-control" style="width:500px;" rows="5" placeholder="Write your Review"></textarea>
                            </div></br></br>
                            <button type="submit" class="btn btn-default submit" style="background-color: black;color:white">Submit review</button>
                        </form></fieldset>
                     
                        
                    </div>
                </div>
            </div>
       
            <
        </div>                                                             
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/script.js"></script>
    
</html>
  </body>
</html>