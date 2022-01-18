<?php
session_start();
include "includes/config.php";
if (!isset($_SESSION['EmployeeID'])){
	require("includes/login_functions.inc.php");
   echo "<script>alert('please log in to delete an employee');document.location='login.php'</script>";
  
  }
  else {
$sql = "DELETE FROM employee WHERE EmployeeID = ". $_GET['cust_id'];
//echo $sql;
$result = mysqli_query( $conn,$sql);
if ($result) {
	echo "Employee Deleted";
	//search for bootstrap / javascript alert or confirm method
	header('location:Eindex.php');
}
}
mysqli_free_result($result);
mysqli_close( $conn );

?>