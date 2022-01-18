<?php
session_start();
include "includes/config.php";

if (!isset($_SESSION['EmployeeID'])){ 
  require("includes/login_functions.inc.php");
 echo "<script>alert('please log in to delete Pet clients');document.location='login.php'</script>";
}
else {
$sql = "DELETE FROM petinfo WHERE PetID = ". $_GET['pet_id'];
//echo $sql;
$result = mysqli_query( $conn,$sql);
if ($result) {
	echo "Pet Deleted";
	//search for bootstrap / javascript alert or confirm method
	header('location:Pindex.php');
}
}
mysqli_free_result($result);
mysqli_close( $conn );

?>