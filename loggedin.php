<?php
include "includes/bootstrap.php";
?>
<?php
session_start();
//var_dump($_SESSION);
if (!isset($_SESSION['EmployeeID'])) {
require ('includes/login_functions.inc.php');
redirect_user();
}
$page_title = 'Logged In!';
include ('includes/header.php');
include ('home.php');
echo "<script>alert('Logged In!')</script>";
include ('includes/footer.php');
?>
