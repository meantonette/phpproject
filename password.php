<?php
include "includes/bootstrap.php";
?>

<?php 
session_start();
// var_dump($_SESSION);

if (!isset($_SESSION['EmployeeID'])){
    echo "<script>alert('please log in to change the password');document.location='login.php'</script>";
}
else {
// This page lets a user change their password.
$page_title = 'Change Your Password';
include ('includes/header.php');

// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 require ('includes/config.php'); 
 $errors = array(); // Initialize an error array.
// Check for an email address:
if (empty($_POST['email'])) {
$errors[] = "<script>alert('Input your Email Address');document.location='password.php'</script>";
} else {
$e = mysqli_real_escape_string($conn, trim($_POST['email']));
}
// Check for the current password:
if (empty($_POST['pass'])) {
$errors[] = "<script>alert('Input your current password');document.location='password.php'</script>";
} else {
$p = mysqli_real_escape_string($conn, trim($_POST['pass']));
}
// Check for a new password and match
// against the confirmed password:
if (!empty($_POST['pass1'])) {
 if ($_POST['pass1'] != $_POST['pass2']) {
 $errors[] = "<script>alert('Your new password did not match the confirmed password');document.location='password.php'</script>";
} else {
$np = mysqli_real_escape_string($conn, trim($_POST['pass1']));
}
} else {
$errors[] = "<script>alert('You forgot to enter your new password.');document.location='password.php'</script>";
}

if (empty($errors)) { // If everything's OK.
// Check that they've entered the right email address/password combination:
 $q = "SELECT EmployeeID FROM employee WHERE (email='$e' AND pass=SHA1('$p') )";
 //SHA1 - hashing 
 $r = @mysqli_query($conn, $q);
 $num = @mysqli_num_rows($r);
 if ($num == 1) { // Match was made.

// Get the Employ_id:
 $row = mysqli_fetch_assoc($r);
 echo $row['Employ_id'];

// Make the UPDATE query:
 $q = "UPDATE employee SET password=SHA1('$np') WHERE EmployeeID =".$row['Employ_id'];
 $r = @mysqli_query($conn, $q);
 if (mysqli_affected_rows($conn) == 1) { // If it ran OK.
// Print a message.
echo "<script>alert('Thank you! Your password has been updated.');document.location='home.php'</script>";

} else { // If it did not run OK.
// Public message:
echo "<script>alert('Your password could not be changed due to a system error. We apologize for any inconvenience.Please try again.');document.location='home.php'</script>";
// Debugging message:
echo '<p>' . mysqli_error($conn) . '<br /><br />Query: ' . $q . '</p>';
}
mysqli_close($conn); // Close the database connection.
// Include the footer and quit the script (to not show the form).
include ('includes/footer.php');
exit();
} else { // Invalid email address/password combination.
echo "<script>alert('The email address and password do not match those on file');document.location='home.php'</script>";

}
} else { // Report the errors.
echo '<h1>Error!</h1>
<p class="error">The following error(s) occurred:<br />';
foreach ($errors as $msg) { // Print each error.
echo " - $msg<br />\n";
}
echo '</p><p>Please try again.</p><p><br /></p>';

} // End of if (empty($errors)) IF.
mysqli_close($conn); // Close the database connection.
} // End of the main Submit conditional.
}//end of else if
?>
<h1>Change Your Password</h1>
<form action="password.php" method="post">
<p>Email Address: <i style="color:red">*</i><input type="text" name="email" size="20" maxlength="60" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"  /> </p>
<p>Current Password: <i style="color:red">*</i><input type="password" name="pass" size="10" maxlength="20" value="<?php if (isset($_POST['pass'])) echo $_POST['pass']; ?>"  /></p>
<p>New Password: <i style="color:red">*</i><input type="password" name="pass1" size="10" maxlength="20" value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>"  /></p>
<p>Confirm New Password: <i style="color:red">*</i><input type="password" name="pass2" size="10" maxlength="20" value="<?php if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>"  /></p>
<p><input type="submit" name="submit" value="Change Password" /></p>
</form>
<?php include ('includes/footer.php'); ?>