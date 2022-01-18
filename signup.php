<?php
include "includes/header.php";
include "includes/bootstrap.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Register</title>

	<!-- Google Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="includes/animate.css">
	<!-- Custom Stylesheet -->
	<link rel="stylesheet" href="includes/style.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
</head>

<body>
<form method="POST" action="register.php" enctype="multipart/form-data" >
<div class="form-group">
	<div class="container">
		<div class="top">
      <h1 id="title" class="hidden"><span id="logo">ACME</span></h1>
		</div>
		<div class="login-box animated fadeInUp">
			<div class="box-header">
				<h2>Sign Up</h2>
			</div>
			
            <label for="lastName">Last Name:</label>
			<br/>
			<input type="text" id="lastName" name="lastName" value="<?php if (isset($_POST['lastName'])) echo $_POST['lastName']; ?>" />
			<br/>

            <label for="firstName">First Name:</label>
			<br/>
			<input type="text" id="firstName" name="firstName" value="<?php if (isset($_POST['firstName'])) echo $_POST['firstName']; ?>" />
			<br/>

			<!-- <label for="eposition">Position:</label>
			<br/>
			<input type="text" id="eposition" name="Input your Position" value="<?php if (isset($_POST['eposition'])) echo $_POST['eposition']; ?>" />
			<br/> -->

            <label for="email">Email Address:</label>
			<br/>
			<input type="text" id="email" name="email" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" />
			<br/>

			<label for="password">Password</label>
			<br/>
			<input type="password" id="password" name="pass1" value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>" />
			<br/>

            <label for="password">Confirm Password:</label>
			<br/>
			<input type="password" id="password" name="pass2" value="<?php if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>" />
			<br/>

			<label for="fileToUpload">Select image to upload:</label>
			<br/>
			<input type="file" id="fileToUpload" name="fileToUpload" value="<?php if (isset($_POST['Img'])) echo $_POST['Img']; ?>" />
			<br/>

			<button type="submit" name="submit" value="Register" >Sign Up</button>
			<br/>

      <p>Already have an account?</p>
			<a href="login.php"><p class="big">LOG IN</p></a>
		</div>
	</div>
</body>
  
<script>
	$(document).ready(function () {
    	$('#logo').addClass('animated fadeInDown');
    	$("input:text:visible:first").focus();
	});
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
