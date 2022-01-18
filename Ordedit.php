<?php
session_start();
include "includes/header.php";
include "includes/config.php";
include "includes/bootstrap.php";

if (!isset($_SESSION['EmployeeID'])){
  require("includes/login_functions.inc.php");
 echo "<script>alert('please log in to edit orders');document.location='login.php'</script>";
}
else {
$result = mysqli_query( $conn,"SELECT * FROM servorderinfo where servordinfoID = ". $_GET['cust_id']);
$row = mysqli_fetch_array($result);
//print_r($row);
?>

p.spacedlines{
   line-height: 150%;
}

<div class="container">
<h2>Update Order</h2>
<form method="POST" action="ordupdate.php" enctype="multipart/form-data">

<div class="form-group">
<label for="cust_id" class="control-label">Service Order Info ID:</label> <i style="color:red">*</i>
<input type='text' class="form-control " id='servordinfoID' name='servordinfoID' value="<?php echo $_GET['cust_id']; ?>">
</div>

<div class="form-group">
<label for="employID" class="control-label">Employee ID:</label> <i style="color:red">*</i>
<input type="text" class="form-control" id="employID" name="employID" value="<?php echo $row['employID'];?>">
</div>

<div class="form-group">
<label for="sched" class="control-label">Schedule:</label> <i style="color:red">*</i>
<input type="date" class="form-control " id="sched" name="sched" value="<?php echo $row['sched'];?>">

 <div>
 <div>
 <button type="submit" name="submit" class="btn btn-primary" value="update">Update</button>
  <a href="Ordindex.php" class="btn btn-default" role="button">Cancel</a>
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