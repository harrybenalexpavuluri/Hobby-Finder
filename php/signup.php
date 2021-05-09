<?php
  include_once 'config.php';

$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);   

session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      	
      $myname = mysqli_real_escape_string($db,$_POST['name']);
     $myemail = mysqli_real_escape_string($db,$_POST['em']); 

     $myphone = mysqli_real_escape_string($db,$_POST['ph']);
     $myusername = mysqli_real_escape_string($db,$_POST['un']);

     $mypassword = mysqli_real_escape_string($db,$_POST['pwd']);
     $mygender = mysqli_real_escape_string($db,$_POST['gender']);
      
      $sql = "insert into signup values('$myname','$myemail',$myphone,'$myusername','$mypassword','$mygender')";
       mysqli_query($db,$sql);
      //$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    
      
      //$count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      //if($count == 1) {
       $sql1 = "insert into user values('$myusername','$mypassword')";
       mysqli_query($db,$sql1);
         $_SESSION['login_user'] = $myusername;
         
         header("location: userindex.php");
      //}
      //if(empty($_SESSION['myusername'])) {
      	//echo 'incorrect username/ password please try again.' ;
     // }      
      /*else {
         $error = "Your Login Name or Password is invalid";
        
         echo '<script>';
         echo 'alert("Invalid details!Try again");';
         echo 'location.href="login.php"';
         echo '</script>';
      }
   }*/
   }
?>

<!doctype html>
<html>
<link rel="stylesheet" type="text/css" href="style.css">
<head>
<script type="text/javascript">
function validateEmail(email) {
    var re = /^[a-z][a-zA-Z0-9_.]*(\.[a-zA-Z][a-zA-Z0-9_.]*)?@[a-z][a-zA-Z-0-9]*\.[a-z]+(\.[a-z]+)?$/;
    return re.test(email);
}

function checkPassword(str)
  {
    var re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/;
    return re.test(str);
  }

  function checkForm(form)
  {  var phoneno = /^\d{10}$/;  
      if(!validateEmail(form.email.value)) {
        alert("The email you have entered is not valid!");
        form.email.focus();
        return false;
      }
      
     if(!form.phone.value.match(phoneno)&& (form.phone.value<=7000000000||form.phone.value>9999999999))  
  {  
     alert("your phone number is invalid");
      return false;  
  }  

    if(form.uname.value == "") {
      alert("Error: Username cannot be blank!");
      form.uname.focus();
      return false;
    }
    re = /^\w+$/;
    if(!re.test(form.uname.value)) {
      alert("Error: Username must contain only letters, numbers and underscores!");
      form.username.focus();
      return false;
    }
    if(form.pwd1.value != "" && form.pwd1.value == form.pwd2.value) {
      if(!checkPassword(form.pwd1.value)) {
        alert("password must contain a uppercase letrer and lowercase letter and a number!");
        form.pwd1.focus();
        return false;
      }
    } else {
      alert("Error: Please check that you've entered and confirmed your password!");
      form.pwd1.focus();
      return false;
    }

    return true;
  }
</script>
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
</head>
<body>
<?php include 'header.php';?>

<fieldset>
<form method="post">
 
      <div class="row">
                    <div class="col-md-4" ></div>
                    <div class="col-md-6  " id="contact_right">
                                                <div id="watermark">
                            <h2 class="page-title text-center">Signup</h2>
                            <div class="marker">S</div>
                        </div>
                        <p class='subtitle'>Way to go!!
                        </p>
                        <fieldset>
<div class="row form-group">
 <div class="col-md-6">
<input type="text" class="form-control" style="width:350px;" id="name" name="name" placeholder="         Name" required ><br>
<div id="errormsg" style="font:italic; color: red;"></div>
</div></div>

<div class="row form-group">
 <div class="col-md-6">
<input type="email" class="form-control" style="width:350px;" id="em" name="em" placeholder="            Email" required><br>
<div id="errormsg" style="font:italic; color: red;"></div>
</div></div>
<div class="row form-group">
 <div class="col-md-6">
<input type="text" class="form-control" style="width:350px;" id="ph" name="ph" placeholder="            Mobile Number" required ><br>
<div id="errormsg" style="font:italic; color: red;"></div>
</div></div>
<div class="row form-group">
 <div class="col-md-6">
<input type="text"  class="form-control" style="width:350px;" id="un" name="un" placeholder="            User Name" required><br>
<div id="errormsg" style="font:italic; color: red;"></div>
</div></div>
<div class="row form-group">
 <div class="col-md-6">
<input type="password" class="form-control" style="width:350px;" id="pwd" name="pwd" placeholder="            Password" required><br>
<div id="errormsg" style="font:italic; color: red;"></div>
</div></div>
<div class="row form-group">
 <div class="col-md-6">
<input type="password" class="form-control" style="width:350px;" id="pwd" name="pwd2" placeholder="       Re-Type Password" required><br>
<div id="errormsg" style="font:italic; color: red;"></div>
</div></div></br></br>
<div class="row form-group">
 <div class="col-md-10">
Gender
<label class="radio-inline">
      <input type="radio" name="gender" value="male">male
    </label>
    <label class="radio-inline">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="radio" name="gender" value="female">female
    </label>
<div id="errormsg" style="font:italic; color: red;"></div>
</div></div></br></br>
<div class="row">
<div class="col-md-6">
<input class="btn btn-default " style="width:100px;background-color:#232322;color:white;" type="reset" id="button"value="Reset">&nbsp&nbsp&nbsp

  
 <!-- <div class="col-md-6"> </div>-->
      
  <button class="btn btn-default " style="width:100px;background-color:#232322;color:white;" type="submit" onclick="return checkform(this)">Signup</button>
   </div></div>
   
   <div class="row">
  </br>
  <!-- <div class="col-md-6 ">new user?? </div>-->
      <div class="col-md-6">
  <a href="login.php">existing user??</a>
   </div></div>

</fielset>
</form>
  <script>

</script>
</body>
</html>