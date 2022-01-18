<?php
session_start();
include "includes/header.php";
include "includes/config.php";
include "includes/bootstrap.php";
?>

p.spacedlines{
   line-height: 150%;
}

<?php
if (!isset($_SESSION['EmployeeID'])){
  require("includes/login_functions.inc.php");
 echo "<script>alert('please log in to add new customer');document.location='login.php'</script>";
}
else {
?>
<div class="container">
<h2>Create New Customer</h2>
<form method="POST" action="Cstore.php" enctype="multipart/form-data" >
<div class="form-group">
<label for="Title" class="control-label">Title:</label> <i style="color:red">*</i>
<input type="text" class="form-control" id="Title" name="Title"  >
</div>
<div class="form-group">
<label for="LastName" class="control-label">Last Name:</label> <i style="color:red">*</i>
<input type="text" class="form-control " id="LastName" name="LastName" ></text>
</div>
<div class="form-group">
<label for="FirstName" class="control-label">FirstName:</label> <i style="color:red">*</i>
<input type="text" class="form-control " id="FirstName" name="FirstName" >
</div>
<div class="form-group">
<label for="Street" class="control-label">Street:</label> <i style="color:red">*</i>
<input type="text" class="form-control" id="Street" name="Street" >
</div>
<div class="form-group">
<label for="City" class="control-label">City:</label> <i style="color:red">*</i>
<input type="text" class="form-control" id="City" name="City">
</div>
<div class="form-group">
<label for="Country" class="control-label">Country:</label> <i style="color:red">*</i>
<input type="text" class="form-control" id="Country" name="Country">
</div>
<div class="form-group">
<label for="ZipCode" class="control-label">Zip Code:</label> <i style="color:red">*</i>
<input type="text" class="form-control" id="ZipCode" name="ZipCode" >
</div>
<div class="form-group">
<label for="PhoneNum" class="control-label">Phone Number:</label> <i style="color:red">*</i>
<input type="text" class="form-control" id="PhoneNum" name="PhoneNum" >
</div>

 <div class="form-group"> 
    <label for="fileToUpload" class="control-label">Select image to upload: </label> <i style="color:red">*</i>
    <input type="file" name="fileToUpload" id="fileToUpload" class="form-control">
 </div>
 <div>
 <button type="submit" name="submit" class="btn btn-primary" value="save">Save</button>
  <a href="Home.php" class="btn btn-default" role="button">Cancel</a>
  </div>     
</form> 
</div>

<?php
}
mysqli_close( $conn );
?>

