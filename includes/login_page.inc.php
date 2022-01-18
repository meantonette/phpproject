<?php
include "includes/bootstrap.php";
?>

<?php 
$page_title = 'Login';
include ('includes/header.php');
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

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Log In</title>

	<!-- Google Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="includes/animate.css">
	<!-- Custom Stylesheet -->
	<link rel="stylesheet" href="includes/style.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
</head>

<body>
	<div class="container">
		<div class="top">
      <h1 id="title" class="hidden"><span id="logo">ACME</span></h1>
	  <form action="login.php" method="POST">
		</div>
		<div class="login-box animated fadeInUp">
			<div class="box-header">
				<h2>Log In</h2>
			</div>
			<label for="email">Email</label>
			<br/>
			<input type="text" id="email" name="email">
			<br/>
			<label for="password">Password</label>
			<br/>
			<input type="password" id="password" name="pass">
			<br/>
			
			<button type="submit" name="submit" value="login" >Log In</button>
			<br/>

			<h1>    </h1>
      <p>Doesn't have any account?</p>
			<a href="signup.php"><p class="big">SIGN UP</p></a>
		</div>
	</div>
</body>
    <!-- <p>Email Address: <input type="text" name="email" size="20" maxlength="60" /> </p>
 <p>Password: <input type="password" name="pass" size="20" maxlength="20" /></p>
 <p><input type="submit" name="submit" value="Login" /></p> -->
<script>
	$(document).ready(function () {
    	$('#logo').addClass('animated fadeInDown');
    	$("input:text:visible:first").focus();
	}); //anut toh bat red ewan
	$('#username').focus(function() {
		$('label[for="username"]').addClass('selected');
	});
	$('#username').blur(function() {
		$('label[for="username"]').removeClass('selected');
	});
	$('#password').focus(function() {
		$('label[for="password"]').addClass('selected');
	});
	$('#password').blur(function() {
		$('label[for="password"]').removeClass('selected');
	});
</script>

</html>
    <!-- <p>Email Address: <input type="text" name="email" size="20" maxlength="60" /> </p>
 <p>Password: <input type="password" name="pass" size="20" maxlength="20" /></p>
 <p><input type="submit" name="submit" value="Login" /></p> -->



