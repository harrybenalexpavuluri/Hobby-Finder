<?php
  include_once 'config.php';

$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);   

session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      	
      $myusername = mysqli_real_escape_string($db,$_POST['uname']);
     $mypassword = mysqli_real_escape_string($db,$_POST['psw']); 
      
      $sql = "SELECT username FROM user WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
       
         $_SESSION['login_user'] = $myusername;
         
         header("location: userindex.php");
      }
      //if(empty($_SESSION['myusername'])) {
      	//echo 'incorrect username/ password please try again.' ;
     // }      
      else {
         $error = "Your Login Name or Password is invalid";
        
         echo '<script>';
         echo 'alert("Invalid details!Try again");';
         echo 'location.href="login.php"';
         echo '</script>';
      }
   }
?>
<!DOCTYPE html>
<html>
<head>



<style>


input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 15px 0;
    display: inline-block;
    border: 1px solid #ccc;
	border-radius: 10px;
    box-sizing: border-box;
}

button {
    background-color:#1e90ff ;
    color: white;
    padding: 14px 20px;
  
    border: 2%;
    cursor: pointer;
    width: 50%;
}

.cancelbtn {
    width: 50%;
    padding: 10px 18px;
	color:white;
    
    cursor: pointer;
    background-color: #f44336;
}

button:hover{
background-color:lightskyblue;
}


.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>HFinder</title>
  
  <meta charset="utf-8">
     <link rel="stylesheet" type="text/css" href="">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/css/bootstrap-theme.min.css" rel="stylesheet">
        <link href="assets/css/font-awesome.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,700,700i" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Crimson+Text:400,700,700i|Josefin+Sans:700" rel="stylesheet">
        <link href="../assets/css/main.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
        
  <script type="text/javascript">
function uProfile()
{
	var un=new String(document.getElementById("uname").value);
	var pd=new String(document.getElementById("psw").value);
	if(un=="")
	{
		document.getElementById("errormsg").innerHTML="Enter UserName";
		//alert("Enter Username");
		return false;
	}
	else if(pd=="")
	{
		document.getElementById("errormsg1").innerHTML="Enter Password";
		//alert("Enter Password");
		return false;
	}
	else
	{
		alert("please wait");
	}
}
</script>

 <body>
 <?php include 'header.php';?>

<fieldset>
<form method="post">
 
   
   
    <div class="row">
                    <div class="col-md-4" ></div>
                    <div class="col-md-6  " id="contact_right">
                                                <div id="watermark">
                            <h2 class="page-title text-center">Login</h2>
                            <div class="marker">L</div>
                        </div>
                        <p class='subtitle'>Way to go!!
                        </p><fieldset>
   
   
   
   
                        <div class="row form-group">
                      <!--<div class="col-md-6">  
                        <label><b>Username &nbsp &nbsp </b></label></div>-->
   <div class="col-md-6"> 
   <input type="text"  class="form-control" style="width:350px;" placeholder="Enter Username" id="uname" name="uname" required>
   <div id="errormsg" style="font:italic; color: red;"></div>
</div></div>
<div class="row form-group">

    <!--<div class="col-md-6">  <label><b>Password &nbsp &nbsp </b></label></div>-->
      <div class="col-md-6">
        <input type="password" class="form-control" style="width:350px;" placeholder="Enter Password" id="psw" name="psw" required>
    <div id="errormsg" style="font:italic; color: red;"></div>
</div></div>
        
  <div class="row">
  
 !<!-- <div class="col-md-6"> </div>-->
      <div class="col-md-6">
  <button class="btn btn-default " style="width:100px;background-color:#232322;color:white;" type="submit" onclick="return uProfile()">Login</button>
   </div></div>
   
   <div class="row">
  <br>
  <!-- <div class="col-md-6 ">new user?? </div>-->
      <div class="col-md-6">
  <a href="signup.php">new user??</a>
   </div></div>

</fielset>
</form>
  </div>
  </div>
	
	<span id="s"></span>  
</html>


