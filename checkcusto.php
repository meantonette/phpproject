<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require('includes/check.inc.php');
    require('includes/config.php');
    list($check, $data) = check_login($conn, $_POST['FirstName'], $_POST['LastName']);
    if ($check) { // OK!
        session_start();
        $_SESSION['CustomerID'] = $data['CustomerID'];
        $_SESSION['FirstName'] = $data['FirstName'];
        redirect_user('checkcustomer.php');
    } else {
        $errors = $data;
    }
    mysqli_close($conn);
}
include('checkcust.php');
