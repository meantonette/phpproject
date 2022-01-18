<?php
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
 echo "<script>alert('please log in to consult');document.location='login.php'</script>";
}
else {
?>

<div class="container">
<h2>Add new Pet</h2>

<form method="POST" action="consultstored.php">
<div class="form-group">

<div class="form-group">
     <label for="employeeId" class="control-label">Employee Name Incharged:</label> <i style="color:red">*</i>
     <select type="text" class="form-control " id="employeeId" name="employeeId" >
     <option value="">--SELECT EMPLOYEE NAME--</option>
    
<?php
$sql = "SELECT EmployeeID, lastName, firstName FROM employee";
$result = mysqli_query( $conn,$sql );
$num_rows = mysqli_num_rows( $result );
echo "<tr>\n";
  while ($row = mysqli_fetch_assoc($result)) {
        // echo "<option value='$row[lastName]'>$row[lastName]</option>";
        echo '<option value=' .$row['EmployeeID']. '>' .$row['firstName'] . ' ' .$row['lastName'] . '</option>';
  }
?>
</select> 
</div>

<div class="form-group">
     <label for="petnum" class="control-label">Pet Name:</label> <i style="color:red">*</i>
     <select type="text" class="form-control " id="petnum" name="petnum" >
     <option value="">--SELECT PET NAME--</option>
   
<?php
$sql = "SELECT p.PetID AS PetID, p.petName AS petName, c.FirstName AS FirstName, c.LastName AS LastName FROM petinfo p INNER JOIN customer c ON p.CustomerID = c.CustomerID";
$result = mysqli_query( $conn,$sql );
$num_rows = mysqli_num_rows( $result );
echo "<tr>\n";
  while ($row = mysqli_fetch_assoc($result)) {
        echo "<option value='$row[PetID]'>$row[petName] | Owner: $row[FirstName],$row[LastName] </option>";
  }
?>
</select> 
</div>

<!--<div class="form-group">
     <label for="CustomerID" class="control-label">Owner Name:</label> <i style="color:red">*</i>
     <select type="text" class="form-control " id="CustomerID" name="CustomerID" >
     <option value="">--SELECT OWNER NAME--</option>-->
<?php
//$sql = 
//"SELECT c.CustomerID, c.Title, c.LastName, c.FirstName FROM customer c INNER JOIN petinfo pt ON pt.CustomerID = c.CustomerID";
//"SELECT CustomerID, Title, FirstName, LastName FROM customer";
//$result = mysqli_query( $conn,$sql );
//$num_rows = mysqli_num_rows( $result );
//echo "<tr>\n";
  //while ($row = mysqli_fetch_assoc($result)) {
        // echo "<option value='$row[lastName]'>$row[lastName]</option>";
    //    echo '<option value=' .$row['CustomerID']. '>' .$row['Title'] . ' ' .$row['FirstName'] . ' ' .$row['LastName'] . '</option>';
  //}
?>

</select>
</div>

<div class="form-group">
<label for="dateconsult" class="control-label">Date of Consultation:</label> <i style="color:red">*</i>
<input type="date" class="form-control " id="dateconsult" name="dateconsult" value="2021-12-01"
       min="2000-01-01" max="2025-12-31"></text>
</div>

<div class="form-group">
<label for="fees" class="control-label">Consultation fee:</label> <i style="color:red">*</i>
<input type="text" class="form-control" id="fees" name="fees"  >
</div>


<div class="form-group">
<label for="petcondition" class="control-label">Pet Condition:</label> <i style="color:red">*</i>
<input type="text" class="form-control" id="petcondition" name="petcondition"  >
</div>

<div class="form-group">
     <label for="diseaseid" class="control-label">Any disease?</label> <i style="color:red">*</i>
     <select type="text" class="form-control " id="diseaseid" name="diseaseid" >
     <option value="">--SELECT DISEASE--</option>
<?php
$sql = "SELECT * FROM diseases";
$result = mysqli_query( $conn,$sql );
$num_rows = mysqli_num_rows( $result );
echo "<tr>\n";
  while ($row = mysqli_fetch_assoc($result)) {
        echo "<option value='$row[diseasenum]'>$row[description]</option>";
  }
?>
</select> 
</div>

<div class="form-group">
     <label for="injuryid" class="control-label">Any injury?</label> <i style="color:red">*</i>
     <select type="text" class="form-control " id="injuryid" name="injuryid" >
     <option value="">--SELECT INJURY--</option>
    
<?php
$sql = "SELECT * FROM injuries";
$result = mysqli_query( $conn,$sql );
$num_rows = mysqli_num_rows( $result );
echo "<tr>\n";
  while ($row = mysqli_fetch_assoc($result)) {
        echo "<option value='$row[injurynum]'>$row[desc]</option>";
  }
?>
</select> 
</div>

<div class="form-group">
<label for="vcomment" class="control-label">Observations or Comments:</label> <i style="color:red">*</i>
<input type="text" class="form-control " id="vcomment" name="vcomment" ></text>
</div>

 <button type="submit" name="submit" class="btn btn-primary" value="save">Save</button>
  <a href="Home.php" class="btn btn-default" role="button">Cancel</a>
  </div>     
</form> 
</div>
<?php
}
?>