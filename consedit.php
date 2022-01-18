<?php
session_start();
include "includes/header.php";
include "includes/config.php";
include "includes/bootstrap.php";

if (!isset($_SESSION['EmployeeID'])){
  require("includes/login_functions.inc.php");
 echo "<script>alert('please log in to edit the consultation file');document.location='login.php'</script>";
}
else {
$result = mysqli_query( $conn,"SELECT * FROM consultation where consultID = ". $_GET['cust_id']);
$row = mysqli_fetch_array($result);
//print_r($row);
?>

p.spacedlines{
   line-height: 150%;
}

<div class="container">
<h2>Update Consultation</h2>
<form method="POST" action="consupdate.php" enctype="multipart/form-data">
<div class="form-group">
<label for="cust_id" class="control-label">Consultation ID:</label> <i style="color:red">*</i>
<input type='text' class="form-control " id='consultID' name='consultID' value="<?php echo $_GET['cust_id']; ?>">
</div>

<div class="form-group">
<label for="employeeId" class="control-label">Employee ID:</label> <i style="color:red">*</i>
<input type="text" class="form-control" id="employeeId" name="employeeId" value="<?php echo $row['employeeId'];?>">
</div>

<div class="form-group">
<label for="petnum" class="control-label">Pet ID:</label> <i style="color:red">*</i>
<input type="text" class="form-control " id="petnum" name="petnum" value="<?php echo $row['petnum'];?>">
</div>

<!-- <div class="form-group">
<label for="FirstName" class="control-label">Date of Consultation:</label> <i style="color:red">*</i>
<input type="text" class="form-control " id="FirstName" name="FirstName" value="">
</div> -->

<div class="form-group">
<label for="dateconsult" class="control-label">Date of Consultation:</label> <i style="color:red">*</i>
<input type="date" class="form-control " id="dateconsult" name="dateconsult" value="<?php echo $row['dateconsult'];?>">

<div class="form-group">
<label for="fees" class="control-label">Fees:</label> <i style="color:red">*</i>
<input type="text" class="form-control" id="fees" name="fees" value="<?php echo $row['fees'];?>">
</div>

</div>
<div class="form-group">
<label for="petcondition" class="control-label">Pet Condition:</label> <i style="color:red">*</i>
<input type="text" class="form-control" id="petcondition" name="petcondition" value="<?php echo $row['petcondition'];?>">
</div>

<div class="form-group">
<label for="diseaseid" class="control-label">Disease id:</label> <i style="color:red">*</i>
<input type="text" class="form-control" id="diseaseid" name="diseaseid" value="<?php echo $row['diseaseid'];?>">
</div>

<div class="form-group">
<label for="injuryid" class="control-label">Injury id:</label> <i style="color:red">*</i>
<input type="text" class="form-control" id="injuryid" name="injuryid" value="<?php echo $row['injuryid'];?>">
</div>

<div class="form-group">
<label for="vcomment" class="control-label">Observations or Comments: </label><i style="color:red">*</i>
<input type="text" class="form-control" id="vcomment" name="vcomment" value="<?php echo $row['vcomment'];?>">
</div>

 <div>
 <div>
 <button type="submit" name="submit" class="btn btn-primary" value="update">Update</button>
  <a href="Consindex.php" class="btn btn-default" role="button">Cancel</a>
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