<?php
session_start();
include "includes/header.php";
include "includes/config.php";
include "includes/bootstrap.php";

if (!isset($_SESSION['EmployeeID'])){
	require ("includes/login_functions.inc.php");
   echo "<script>alert('please log in to edit current services');document.location='login.php'</script>";
  }
  else {
$result = mysqli_query( $conn,"SELECT * FROM petservices where ServiceID = ". $_GET['serv_id']);
$row = mysqli_fetch_array($result);
//print_r($row);
?>

p.spacedlines{
   line-height: 150%;
}

<div class="container">
<h2>Update Pet Services</h2>
<form method="POST" action="Supdate.php" enctype="multipart/form-data">
<div class="form-group">
<label for="serv_id" class="control-label">Service ID:</label> <i style="color:red">*</i>
<input type='text' class="form-control " id='ServiceID' name='ServiceID' value="<?php echo $_GET['serv_id']; ?>">
</div>

<div class="form-group">
<label for="servname" class="control-label">Title:</label> <i style="color:red">*</i>
<input type="text" class="form-control" id="servname" name="servname" value="<?php echo $row['servname'];?>">
</div>

<div class="form-group">
<label for="Descrip" class="control-label">Description:</label> <i style="color:red">*</i>
<input type="text" class="form-control " id="Descrip" name="Descrip" value="<?php echo $row['Descrip'];?>">

<div class="form-group">
<label for="Price" class="control-label">Price:</label> <i style="color:red">*</i>
<input type="text" class="form-control" id="Price" name="Price" value="<?php echo $row['Price'];?>">
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
  <a href="Sindex.php" class="btn btn-default" role="button">Cancel</a>
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