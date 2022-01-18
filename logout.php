<?php
session_start();
var_dump($_SESSION);
if (!isset($_SESSION['EmployeeID'])) {
 require ('includes/login_functions.inc.php');
 redirect_user();
} else {
 //$_SESSION = array();
setcookie ('PHPSESSID', '', time()-3600, '/', '', 0, 0);
$page_title = 'Logged Out!';
include ('includes/header.php');
include ('home.php');
echo "<script>alert('Logged Out!')</script>
<p>You are now logged out, {$_SESSION['lastName']}!</p>";
session_destroy();
include ('includes/footer.php');
}

?>