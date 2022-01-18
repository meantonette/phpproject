<?php
session_start();
include "includes/config.php";
if (!isset($_SESSION['EmployeeID'])){
	require("includes/login_functions.inc.php");
   echo "<script>alert('please log in to delete customer');document.location='login.php'</script>";
  }
  else {
$sql = "DELETE FROM customer WHERE CustomerID = ". $_GET['cust_id'];
//echo $sql;
$result = mysqli_query( $conn,$sql);
if ($result) {
	echo "Customer Deleted";
	//search for bootstrap / javascript alert or confirm method
	header('location:Cindex.php');
}
}
mysqli_free_result($result);
mysqli_close( $conn );
?>