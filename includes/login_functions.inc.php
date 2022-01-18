<?php 
function redirect_user($page = 'login_page.inc.php') {
 // Start defining the URL...
 // URL is http:// plus the host name plus the current directory:
 $url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
 // Remove any trailing slashes:
 $url = rtrim($url, '/\\');
 // Add the page:
 $url .= '/' . $page;
 // Redirect the user:
 header("Location: $url");
 exit(); // Quit the script.
} // End of redirect_user() function.

function check_login($conn, $email = '', $pass = '') {
 $errors = array(); // Initialize error array.
 // Validate the email address:
 if (empty($email)) {
 $errors[] = "<script>alert('You forgot to enter your email address.');document.location='login.php'</script>";
 
 } else {
 $e = mysqli_real_escape_string($conn, trim($email));
 }
 // Validate the password:
 if (empty($pass)) {
 $errors[] = "<script>alert('You forgot to enter your password.');document.location='login.php'</script>";
 
 } else {
 $p = mysqli_real_escape_string($conn, trim($pass));
 }
 if (empty($errors)) { // If everything's OK.
 // Retrieve the user_id and first_name for that email/password combination:
 $q = "SELECT EmployeeID, lastName FROM employee WHERE email='$e' AND pass=SHA1('$p')"; 
 $r = @mysqli_query ($conn, $q); // Run the query.
 // Check the result:
 if (mysqli_num_rows($r) == 1) {
 // Fetch the record:
 $row = mysqli_fetch_array ($r, MYSQLI_ASSOC);
 // Return true and the record:
 return array(true, $row);
 } else { // Not a match!
 $errors[] = "<script>alert('The email address and password entered do not match those on file.');document.location='login.php'</script>";
 }
 } // End of empty($errors) IF.
 // Return false and the errors:
 return array(false, $errors);
} // End of check_login() function.