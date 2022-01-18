<?php
session_start();
$_SESSION['product1'] = "Sonic Screwdriver";
$_SESSION['product2'] = "HAL 2000";
print "The products have been registered";
?>