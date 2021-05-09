<!DOCTYPE html>
<html lang="en">
<head>
  <title>HFinder</title>
  <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body  background="images/wood.png" class="form-inline" >

<?php include 'header.php';?>
<?php
   include('session.php');
?>
<div class="row">
<center><h1>Hello <?php echo $login_session; ?></h1></center></div>
<div class="row">
<div class="col-md-0"></div>
<div class="col-md-2">
<!-- <button class="btn" style="background-color: black;color:grey;">Popular Searches</button></br></br></br>
-->

<?php
include_once 'config.php';

$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);


//if($_SERVER["REQUEST_METHOD"] == "POST") {

$sql="select activity,count(*) as c from popular_searches  group by activity order by c desc limit 3";
$result = mysqli_query($db,$sql);

 ?>
  <!-- Trigger the modal with a button -->
  <button class="btn" style="background-color: black;color:grey;" data-toggle="modal" data-target="#myModal">Popular Searches</button>
</br></br></br>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Popular Searches</h4>
        </div>
        <div class="modal-body">
    <?php 
    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
    {
    echo $row["activity"];
    echo "</br></br></br>";
    }

    ?>
                 </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
 





<button class="btn" style="background-color: black;color:grey;">Find your interest</button></div>

<div class="col-md-10">
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="../images/painting.jpg" alt="Image" style="width:100%;">
      </div>

      <div class="item">
        <img src="../images/instrument.jpg" alt="instrument" style="width:100%;">
      </div>
    
      <div class="item">
        <img src="../images/skating.jpg" alt="skating" style="width:100%;">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div></div>

</div></body>