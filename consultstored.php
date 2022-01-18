<?php
session_start();
include "includes/bootstrap.php";
include("includes/config.php");
$page_title = 'Save consultation';
include ('includes/header.php');

if (!isset($_SESSION['EmployeeID']) ) {
 require ('includes/login_functions.inc.php');
 echo "<script>alert('please log in to consult');document.location='login.php'</script>";
//  redirect_user('Fail.php');
}
//print_r($_SESSION);
 //try

else{
mysqli_query($conn,'START TRANSACTION');
$q = 'INSERT INTO consultation(employeeId, petnum, dateconsult, fees, petcondition, diseaseid, injuryid, vcomment) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
//$flag = true;

// $orderinfo_id = mysqli_insert_id($conn);
// echo $orderinfo_id;
// $q2 = 'INSERT INTO orderline(orderinfo_id ,item_id,quantity)VALUES (?, ?, ?)';
// $stmt2 = mysqli_prepare($dbc, $q2);
// mysqli_stmt_bind_param($stmt2, 'iii', $orderinfo_id, $product_code,$product_qty);
// $q3 = 'UPDATE stock SET quantity = quantity - ? where item_id = ?';
// $stmt3 = mysqli_prepare($dbc, $q3);
// mysqli_stmt_bind_param($stmt3, 'ii', $product_qty,$product_code);
// print_r($_SESSION["cart_products"]);

if ($_POST['submit'] == "save"){ 

    if (isset($_POST['submit'])) {
        if (empty($_POST['employeeId'])) {
       $errors[] = "<script>alert('Input employee');document.location='consultadd.php'</script>";
       
        } else { 
            $employeeId = $_POST['employeeId'];
        }
    }
    
        if (isset($_POST['submit'])) {
        if (empty($_POST['petnum'])) {
       $errors[] = "<script>alert('Input your Pet Name');document.location='consultadd.php'</script>";
        } else { 
            $petID = $_POST['petnum'];
        }
    }
    
    if (isset($_POST['submit'])) {
        if (empty($_POST['dateconsult'])) {
       $errors[] = "<script>alert('Input your Consultation Date');document.location='consultadd.php'</script>";
        } else { 
            $dateconsult = $_POST['dateconsult'];
        }
    }
    
    if (isset($_POST['submit'])) {
        if (empty($_POST['fees'])) {
       $errors[] = "<script>alert('Input consultation fees');document.location='consultadd.php'</script>";
        } else { 
            $fees = $_POST['fees'];
        }
    }
   
    if (isset($_POST['submit'])) { 
        if (empty($_POST['petcondition'])) {
       $errors[] = "<script>alert('Input Pet condition');document.location='consultadd.php'</script>";
        } else { 
            $petcondition = $_POST['petcondition'];
        }
    }
    
    if (isset($_POST['submit'])) {
        if (empty($_POST['diseaseid'])) {
       $errors[] = "<script>alert('Input any disease');document.location='consultadd.php'</script>";
        } else { 
            $disease = $_POST['diseaseid'];
        }
    }    

    if (isset($_POST['submit'])) {
        if (empty($_POST['injuryid'])) {
       $errors[] = "<script>alert('Input any injury');document.location='consultadd.php'</script>";
        } else { 
            $injury = $_POST['injuryid'];
        }
    }

    if (isset($_POST['submit'])) {
        if (empty($_POST['vcomment'])) {
       $errors[] = "<script>alert('Input any comment');document.location='consultadd.php'</script>";
        } else { 
            $vcomment = $_POST['vcomment'];
        }
    }

//   mysqli_stmt_execute($stmt2);
//   mysqli_stmt_execute($stmt3);
$consultation = mysqli_prepare($conn, $q);
mysqli_stmt_bind_param($consultation, 'iisisiis', $employeeId, $petID, $dateconsult, $fees, $petcondition, $disease, $injury, $vcomment);
mysqli_stmt_execute($consultation);

   if((mysqli_stmt_affected_rows($consultation) > 0) ){
    mysqli_commit($conn);
  //unset($_SESSION['EmployeeID']);
  echo "<script>alert('Consultation Saved!');document.location='Home.php'</script>";
    }else
    {
 mysqli_rollback($conn);
 echo "<script>alert('Error');document.location='consultadd.php'</script>";
 }
}
 //catch(mysqli_sql_exception $e) {
  //mysqli_rollback($dbc);
 }
// header('Location: ordered.php');