<?php
session_start();
include "includes/config.php";

if (!isset($_SESSION['EmployeeID'])){
	require ("includes/login_functions.inc.php");
   echo "<script>alert('please log in to delete current services');document.location='login.php'</script>";
  }
  else {
$sql = "DELETE FROM petservices WHERE ServiceID = ". $_GET['serv_id'];
//echo $sql;
$result = mysqli_query( $conn,$sql);
if ($result) {
	echo "Pet Service Deleted";
	//search for bootstrap / javascript alert or confirm method
	header('location:Sindex.php');
}
}
mysqli_free_result($result);
mysqli_close( $conn );

?>