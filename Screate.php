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
	require ("includes/login_functions.inc.php");
   echo "<script>alert('please log in to create services');document.location='login.php'</script>";
  }
  else {
?>

<div class="container">
<h2>Create New Pet Service</h2>

<form method="POST" action="Sstore.php" enctype="multipart/form-data" >
<div class="form-group">
<label for="servname" class="control-label">Title:</label> <i style="color:red">*</i>
<input type="text" class="form-control" id="servname" name="servname"  >
</div>

<div class="form-group">
<label for="Descrip" class="control-label">Description:</label> <i style="color:red">*</i>
<input type="text" class="form-control " id="Descrip" name="Descrip" ></text>
</div>

<div class="form-group">
<label for="Price" class="control-label">Price:</label> <i style="color:red">*</i>
<input type="text" class="form-control " id="Price" name="Price" ></text>
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
mysqli_free_result($result);
mysqli_close( $conn );
 ?>