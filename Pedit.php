<?php
session_start();
include "includes/header.php";
include "includes/config.php";
include "includes/bootstrap.php";

if (!isset($_SESSION['EmployeeID'])){ 
  require("includes/login_functions.inc.php");
 echo "<script>alert('please log in to edit current Pet clients');document.location='login.php'</script>";
}
else {
$result = mysqli_query( $conn,"SELECT * FROM petinfo where PetID = ". $_GET['pet_id']);
$row = mysqli_fetch_array($result);
//print_r($row);
?>

p.spacedlines{
   line-height: 150%;
}

<div class="container">
<h2>Update Pet</h2>
<form method="POST" action="Pupdate.php" enctype="multipart/form-data">
<div class="form-group">
<label for="pet_id" class="control-label">Pet ID:</label> <i style="color:red">*</i>
<input type='text' class="form-control " id='PetID' name='PetID' value="<?php echo $_GET['pet_id']; ?>">
</div>

<div class="form-group">
<label for="petName" class="control-label">Pet Name:</label> <i style="color:red">*</i>
<input type="text" class="form-control" id="petName" name="petName" value="<?php echo $row['petName'];?>">
</div>

<div class="form-group">
     <label for="CustomerID" class="control-label">Owner ID:</label> <i style="color:red">*</i>
     <input type="text" class="form-control " id="CustomerID" name="CustomerID" value="<?php echo $row['CustomerID'];?>">
     <!-- <option value="">--SELECT OWNER NAME--</option> -->
     <!-- <select type="text" class="form-control " id="sex" name="sex">  -->
<?php
// $sql = "SELECT * FROM customer";
// $result = mysqli_query( $conn,$sql );
// $num_rows = mysqli_num_rows( $result );
// echo "<tr>\n";
//   while ($row = mysqli_fetch_assoc($result)) {
//    //echo print_r($row);  
//         // echo "<td>".$row['LastName']."</td>";
//         echo "<option value='$row[LastName]'>$row[LastName]</option>";
//   }
     ?>
<!-- </select>  -->
</div>

<div class="form-group">
<label for="breed" class="control-label">Breed:</label> <i style="color:red">*</i>
<input type="text" class="form-control " id="breed" name="breed" value="<?php echo $row['breed'];?>">
</div>

<div class="form-group">
<label for="species" class="control-label">Species:</label> <i style="color:red">*</i>
<input type="text" class="form-control" id="species" name="species" value="<?php echo $row['species'];?>">
</div>


<div class="form-group">
<label for="color" class="control-label">Color:</label> <i style="color:red">*</i>
<input type="text" class="form-control" id="color" name="color" value="<?php echo $row['color'];?>">
</div>

<div class="form-group">
<label for="sex" class="control-label">Sex:</label> <i style="color:red">*</i>
<input type="text" class="form-control " id="sex" name="sex" value="<?php echo $row['sex'];?>"> 
<!-- <option value="">--SELECT SEX--</option>
<option value="Male"> Male </option>
<option value="Female">Female </option>
</select> -->
</div>

<div class="form-group">
<label for="birth" class="control-label">Date of Birth:</label> <i style="color:red">*</i>
<!-- <input type="text" class="form-control" id="birth" name="birth" value="<?php echo $row['birth'];?>"> -->
<input type="date" class="form-control " id="birth" name="birth" value="<?php echo $row['birth'];?>"
       min="2000-01-01" max="2025-12-31"></text>
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
    <?php echo "<img border=\"0\" src=\"".$row['Img']."\" width=\"250\" alt=\"pet\" height=\"250\">" ?>
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