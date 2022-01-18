<?php
session_start();
include "includes/header.php";
include "includes/bootstrap.php";
?>
p.spacedlines{
   line-height: 150%;
}

<?php
if (!isset($_SESSION['EmployeeID'])){
  require("includes/login_functions.inc.php");
 echo "<script>alert('please log in to shop');document.location='login.php'</script>";
}
else {
?>
<!DOCTYPE html PUBLIC>
<html>
<!-- <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'> -->

<link rel="stylesheet" href="includes/style.css">

<head>
  <title>Checking</title>
</head>

<style>
   .div-2 {
        height: 300px;
        margin: auto;
        width: 600px;
        border: 3px solid;
        text-align: center;
        background-color: #CAAEFF;
    }

    .div-1 {
        background-color: #FFB5CF;
    }
    
    /* .div-2 {
    	background-color: #ABBAEA;
    }
    
    .div-3 {
    	background-color: #FBD603;
    } */
</style>


<body>

  <?php

  // Print any error messages, if they exist:
  if (isset($errors) && !empty($errors)) {
    echo '<h1>Error!</h1>
 <p class="error">The following error(s) occurred:<br />';
    foreach ($errors as $msg) {
      echo " - $msg<br />\n";
    }
    echo '</p><p>Please try again.</p>';
  }

  ?>

<div class="div-1">
		<!-- <div class="top"> -->
  <form action="checkcusto.php" method="POST">

    <h1 align='center'>Customer Information Check</h1>
    <i style="font-style: Brush Script MT, Brush Script Std, cursive;"><h1 align='center'>Customer Information Check</h1></i>
</div>

<div class="div-2">
  <br>
  <br>
  <center><h1>&#x1F4BB;</h1></center>
    <font size="+2"><p align='center'>First Name: <input type="text" name="FirstName"></p></font>
    <font size="+2"><p align='center'>Last Name: <input type="text" name="LastName"></p></font>
    <font size="+1"><p align='center'><input type="submit" name="submit" value="Check"></p></font>
    <!-- <a href="Ccreate.php" class="button">Make an account Here!</a>  -->
</div>
  </form>
</body>
<?php
}
?>

</html>