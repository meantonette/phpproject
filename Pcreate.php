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
 echo "<script>alert('please log in to add new pet');document.location='login.php'</script>";
}
else {
?>

<div class="container">
<h2>Add new Pet</h2>

<form method="POST" action="Pstore.php" enctype="multipart/form-data" >
<div class="form-group">
<label for="petName" class="control-label">Pet Name:</label> <i style="color:red">*</i>
<input type="text" class="form-control" id="petName" name="petName"  >
</div>

<div class="form-group">
     <label for="petowner" class="control-label">Owner Name:</label> <i style="color:red">*</i>
     <select type="text" class="form-control " id="petowner" name="petowner" >
     <option value="">--SELECT OWNER NAME--</option>
     <!-- <select type="text" class="form-control " id="sex" name="sex">  -->
<?php
$sql = "SELECT CustomerID, Title, LastName, FirstName FROM customer";
$result = mysqli_query( $conn,$sql );
$num_rows = mysqli_num_rows( $result );
echo "<tr>\n";
  while ($row = mysqli_fetch_assoc($result)) {
   //echo print_r($row);  
        // echo "<td>".$row['LastName']."</td>";
      //   echo "<option value= '$row[FirstName]'> ',' $row[LastName]</option>";
   echo '<option value=' .$row['CustomerID']. '>' .$row['Title'] . ' ' .$row['FirstName'] . ' ' .$row['LastName'] . '</option>';

}
     ?>
</select> 

</div>

<div class="form-group">
<label for="breed" class="control-label">Breed:</label> <i style="color:red">*</i>
<input type="text" class="form-control " id="breed" name="breed" ></text>
</div>

<div class="form-group">
<label for="species" class="control-label">Species:</label> <i style="color:red">*</i>
<input type="text" class="form-control " id="species" name="species" ></text>
</div>

<div class="form-group">
<label for="color" class="control-label">Color:</label> <i style="color:red">*</i>
<input type="text" class="form-control " id="color" name="color" ></text>
</div>

<div class="form-group">
<label for="sex" class="control-label">Sex:</label> <i style="color:red">*</i>
<select type="text" class="form-control " id="sex" name="sex"> 
<option value="">--SELECT SEX--</option>
<option value="Male"> Male </option>
<option value="Female">Female </option>
</select>
</div>

<div class="form-group">
<label for="birth" class="control-label">Date of Birth:</label> <i style="color:red">*</i>
<input type="date" class="form-control " id="birth" name="birth" value="2021-12-01"
       min="2000-01-01" max="2025-12-31"></text>
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