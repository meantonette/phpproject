<?php
include "includes/bootstrap.php";
?>

<?php 
$page_title = 'Register';
include ('includes/header.php');
// Check for form submission:

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
require ('includes/config.php'); // Connect to the db.
$errors = array(); // Initialize an error array.

        // Check for a last name:
if (empty($_POST['lastName'])) {
    $errors[] = "<script>alert('Input your Last Name.');document.location='signup.php'</script>";
    } else {
    $ln = mysqli_real_escape_string($conn, trim($_POST['lastName']));
    }

// Check for a first name:
if (empty($_POST['firstName'])) {
$errors[] = "<script>alert('Input your First Name.');document.location='signup.php'</script>";
} else {
$fn = mysqli_real_escape_string($conn, trim($_POST['firstName']));
}

// // Check for the Position:
//     if (empty($_POST['eposition'])) {
//         $errors[] = "<script>alert('Input your Position.');document.location='signup.php'</script>";
//         } else {
//             $epos = $_POST['eposition'];
//         }

// Check for an email address:
if (empty($_POST['email'])) {
$errors[] = "<script>alert('Input your Email Address.');document.location='signup.php'</script>";
} else {
$e = mysqli_real_escape_string($conn, trim($_POST['email']));
}

// Check for a password and match against the confirmed password:
if (!empty($_POST['pass1'])) {
if ($_POST['pass1'] != $_POST['pass2']) {
$errors[] = "<script>alert('Your password did not match the confirmed password.');document.location='signup.php'</script>";
} else {
$p = mysqli_real_escape_string($conn, trim($_POST['pass1']));
}
} else {
$errors[] = "<script>alert('You forgot to enter your password.');document.location='signup.php'</script>";
}

$target_dir = "././UploadEmployee/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
       // echo "File is an image - " . $check["mime"] . "."; 
        $uploadOk = 1;
    } else {
        echo "<script>alert('File is not an image.');document.location='signup.php'</script>";
        $uploadOk = 0;
    }
//Check if file already exists

if (file_exists($target_file)) {
    echo "<script>alert('Sorry, file already exists.');document.location='signup.php'</script>";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "<script>alert('Sorry, your file is too large.');document.location='signup.php'</script>";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png" && $imageFileType != "gif" ) {
    echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');document.location='signup.php'</script>";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "<script>alert('Sorry, your file was not uploaded.');document.location='signup.php'</script>";
// if everything is ok, try to upload file
} 

if(empty($errors)){ //continue

    (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)); 
    
    echo nl2br("The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.\n");

// if (empty($errors)) { // If everything's OK.
// Register the user in the database...
// Make the query:
$q = "INSERT INTO employee (lastName, firstName, email, pass, hiredDate, Img) VALUES ('$ln', '$fn', '$e', SHA1('$p'), NOW(), '$target_file' )";
$r = @mysqli_query ($conn, $q); // Run the query.
if ($r) { // If it ran OK.
// Print a message:
echo "<script>alert('You are now registered. You can now proceed to Log in!');document.location='login.php'</script>";
} else { // If it did not run OK.
// Public message:
echo "<script>alert('You could not be registered due to a system error. We apologize for any inconvenience. Please try again');document.location='signup.php'</script>";
// Debugging message:
echo '<p>' . mysqli_error($conn) . '<br /><br />Query: ' . $q . '</p>';
} // End of if ($r) IF.
mysqli_close($conn); // Close the database connection.
// Include the footer and quit the script:
// include ('includes/footer.php');
exit();
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
?>

<!-- Display sign up -->
