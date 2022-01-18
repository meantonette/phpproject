<?php 
session_start();
if ($_SERVER['REQUEST_METHOD'] =='POST') {
require ('includes/login_functions.inc.php');
require ('includes/config.php');
list ($check, $data) = check_login ($conn, $_POST['email'], $_POST['pass']);
if ($check) { // OK!
session_start();
$_SESSION['EmployeeID'] = $data['EmployeeID'];
$_SESSION['lastName'] = $data['lastName'];
redirect_user('loggedin.php');
} else {
$errors = $data;
}
mysqli_close($conn);
}
include ('includes/login_page.inc.php');

?>