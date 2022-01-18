<?php
function redirect_user($page = 'checkcust.php')
{

    $url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
    // Remove any trailing slashes:
    $url = rtrim($url, '/\\');
    // Add the page:
    $url .= '/' . $page;
    // Redirect the user:
    header("Location: $url");
    exit();
}

function check_login($conn, $FirstName = '', $LastName = '')
{
    $errors = array(); // Initialize error array.
    // Validate the email address:
    if (empty($FirstName)) {
        $errors[] = 'You forgot to enter your FirstName.';
    } else {
        $first = mysqli_real_escape_string($conn, trim($FirstName));
    }
    // Validate the password:
    if (empty($LastName)) {
        $errors[] = 'You forgot to enter your LastName.';
    } else {
        $last = mysqli_real_escape_string($conn, trim($LastName));
    }
    if (empty($errors)) { // If everything's OK.
        // Retrieve the user_id and first_name for that email/password combination:
        $q = "SELECT CustomerID , FirstName, LastName FROM customer WHERE FirstName='$first' AND LastName='$last'";
        $r = @mysqli_query($conn, $q); // Run the query.
        // Check the result:
        if (mysqli_num_rows($r) == 1) {
            // Fetch the record:
            $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
            // Return true and the record:
            return array(true, $row);
        } else { // Not a match!
            $errors[] = 'Your FirstName and LastName you entered do not match those on file.';
        }
    } // End of empty($errors) IF.
    // Return false and the errors:
    return array(false, $errors);
} // End of check_login() function.