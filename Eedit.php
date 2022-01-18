<?php
// session_start();
include "includes/header.php";
include "includes/config.php";
include "includes/bootstrap.php";

if (!isset($_SESSION['EmployeeID'])){
	require("includes/login_functions.inc.php");
   echo "<script>alert('please log in to edit an employee');document.location='login.php'</script>";
  
  }
  else {
$result = mysqli_query( $conn,"SELECT * FROM employee where EmployeeID= ". $_GET['cust_id']);
$row = mysqli_fetch_array($result);
//print_r($row);
?>

p.spacedlines{
   line-height: 150%;
}

<div class="container">
<h2>Update Customer</h2>
<form method="POST" action="Eupdate.php" enctype="multipart/form-data">
<div class="form-group">
<label for="cust_id" class="control-label">Employee ID:</label> <i style="color:red">*</i>
<input type='text' class="form-control " id='EmployeeID' name='EmployeeID' value="<?php echo $_GET['cust_id'];?>">
</div>
<div class="form-group">
<label for="lastName" class="control-label">Last Name:</label> <i style="color:red">*</i>
<input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo $row['lastName'];?>">
</div>
<div class="form-group">
<label for="firstName" class="control-label">First Name:</label> <i style="color:red">*</i>
<input type="text" class="form-control " id="firstName" name="firstName" value="<?php echo $row['firstName'];?>">

</div>
<div class="form-group">
<label for="email" class="control-label">Email Address:</label> <i style="color:red">*</i>
<input type="text" class="form-control " id="email" name="email" value="<?php echo $row['email'];?>">
</div>

<div class="form-group"> 
    <label for="fileToUpload" class="control-label">Select image to upload:</label><i style="color:red">*</i>
    <input type="file" name="fileToUpload" id="fileToUpload" class="form-control">
  <!--   //label if gusto mo ilagay yung file name -->
 </div>
 <div>
  <div class="form-group"> 
    <label for="fileToUpload" class="control-label">Photo:</label>
    <?php echo "<img border=\"0\" src=\"".$row['Img']."\" width=\"250\" alt=\"Customer\" height=\"250\">" ?>
 </div>
 <div>
 <div>
 <button type="submit" name="submit" class="btn btn-primary" value="update">Update</button>
  <a href="Eindex.php" class="btn btn-default" role="button">Cancel</a>
  </div>     
</div>
</form> 
</div>
<?php
}
mysqli_free_result($result);
mysqli_close( $conn );
 ?>
 </body>
 </html>