<?php
session_start();
include "includes/header.php";
include "includes/config.php";
include "includes/bootstrap.php";

if (!isset($_SESSION['EmployeeID'])){
  require("includes/login_functions.inc.php");
 echo "<script>alert('please log in to edit a customer');document.location='login.php'</script>";
}
else {
$result = mysqli_query( $conn,"SELECT * FROM customer where CustomerID = ". $_GET['cust_id']);
$row = mysqli_fetch_array($result);
//print_r($row);
?>

p.spacedlines{
   line-height: 150%;
}

<div class="container">
<h2>Update Customer</h2>
<form method="POST" action="Cupdate.php" enctype="multipart/form-data">
<div class="form-group">
<label for="cust_id" class="control-label">Customer ID:</label> <i style="color:red">*</i>
<input type='text' class="form-control " id='CustomerID' name='CustomerID' value="<?php echo $_GET['cust_id']; ?>">
</div>
<div class="form-group">
<label for="Title" class="control-label">Title:</label> <i style="color:red">*</i>
<input type="text" class="form-control" id="Title" name="Title" value="<?php echo $row['Title'];?>">
</div>
<div class="form-group">
<label for="LastName" class="control-label">Last Name:</label> <i style="color:red">*</i>
<input type="text" class="form-control " id="LastName" name="LastName" value="<?php echo $row['LastName'];?>">

</div>
<div class="form-group">
<label for="FirstName" class="control-label">First Name:</label> <i style="color:red">*</i>
<input type="text" class="form-control " id="FirstName" name="FirstName" value="<?php echo $row['FirstName'];?>">

</div>
<div class="form-group">
<label for="Street" class="control-label">Street:</label> <i style="color:red">*</i>
<input type="text" class="form-control" id="Street" name="Street" value="<?php echo $row['Street'];?>">
</div>


</div>
<div class="form-group">
<label for="City" class="control-label">City:</label> <i style="color:red">*</i>
<input type="text" class="form-control" id="City" name="City" value="<?php echo $row['City'];?>">
</div>

<div class="form-group">
<label for="Country" class="control-label">Country:</label> <i style="color:red">*</i>
<input type="text" class="form-control" id="Country" name="Country" value="<?php echo $row['Country'];?>">
</div>

<div class="form-group">
<label for="ZipCode" class="control-label">Zip Code:</label> <i style="color:red">*</i>
<input type="text" class="form-control" id="ZipCode" name="ZipCode" value="<?php echo $row['ZipCode'];?>">
</div>

<div class="form-group">
<label for="PhoneNum" class="control-label">Phone Number:</label><i style="color:red">*</i>
<input type="text" class="form-control" id="PhoneNum" name="PhoneNum" value="<?php echo $row['PhoneNum'];?>">
</div>

</select>
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
  <a href="Cindex.php" class="btn btn-default" role="button">Cancel</a>
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