<?php
include "includes/config.php";
print_r($_POST);
if ($_POST['submit'] ==  "update"){
$employID = $_POST['employID'];
$sched = $_POST['sched'];

$sql = "UPDATE servorderinfo set employID = '$employID', sched = '$sched'
         WHERE servordinfoID=".$_POST['servordinfoID'];
        echo $sql;
 $result = mysqli_query( $conn,$sql);
 if ($result) {
   header("location: Ordindex.php");
 }
 else{
   echo mysqli_error();
 }
     }
?>