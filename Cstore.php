
<?php
include "includes/header.php";
include "includes/config.php";
include "includes/bootstrap.php";
?>

<?php
//print_r($_POST);
$errors = array(); 

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $errors = array();

if ($_POST['submit'] == "save"){ 

    if (isset($_POST['submit'])) {
        if (empty($_POST['Title'])) {
       $errors[] = "<script>alert('Input Title');document.location='Ccreate.php'</script>";
       
        } else { 
            $Title = $_POST['Title'];
        }
    }
    
        if (isset($_POST['submit'])) {
        if (empty($_POST['LastName'])) {
       $errors[] = "<script>alert('Input your Last Name');document.location='Ccreate.php'</script>";
        } else { 
            $LastName = $_POST['LastName'];
        }
    }
    
        if (isset($_POST['submit'])) { 
        if (empty($_POST['FirstName'])) { 
        $errors[] = "<script>alert('Input your First Name');document.location='Ccreate.php'</script>"; //if null, it will prompt
        } else { 
            $FirstName = $_POST['FirstName']; 
        }
    }
    
    if (isset($_POST['submit'])) {
        if (empty($_POST['Street'])) {
       $errors[] = "<script>alert('Input your Street Address');document.location='Ccreate.php'</script>";
        } else { 
            $Street = $_POST['Street'];
        }
    }
    
    if (isset($_POST['submit'])) {
        if (empty($_POST['City'])) {
       $errors[] = "<script>alert('Input your City');document.location='Ccreate.php'</script>";
        } else { 
            $City = $_POST['City'];
        }
    }
    
    if (isset($_POST['submit'])) {
        if (empty($_POST['Country'])) {
       $errors[] = "<script>alert('Input your Country');document.location='Ccreate.php'</script>";
        } else { 
            $Country = $_POST['Country'];
        }
    }
    
    if (isset($_POST['submit'])) { 
        if (empty($_POST['ZipCode'])) {
       $errors[] = "<script>alert('Input your Zip Code');document.location='Ccreate.php'</script>";
        } else { 
            $ZipCode = $_POST['ZipCode'];
        }
    }
    
    if (isset($_POST['submit'])) {
        if (empty($_POST['PhoneNum'])) {
       $errors[] = "<script>alert('Input your Phone Number');document.location='Ccreate.php'</script>";
        } else { 
            $PhoneNum = $_POST['PhoneNum'];
        }
    }    

$target_dir = "././UploadCustomer/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "<script>alert('File is not an image.');document.location='Ccreate.php'</script>";
        $uploadOk = 0;
    }
//Check if file already exists

if (file_exists($target_file)) {
    echo "<script>alert('Sorry, file already exists.');document.location='Ccreate.php'</script>";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "<script>alert('Sorry, your file is too large.');document.location='Ccreate.php'</script>";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png" && $imageFileType != "gif" ) {
    echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');document.location='Ccreate.php'</script>";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "<script>alert('Sorry, your file was not uploaded.');document.location='Ccreate.php'</script>";
// if everything is ok, try to upload file
} 

if(empty($errors)){ //continue

    (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)); 
    
    echo nl2br("The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.\n");

    $sql = "INSERT INTO customer(Title, LastName, FirstName, Street, City, Country, ZipCode, PhoneNum, Img) VALUES ('$Title','$LastName','$FirstName', '$Street', '$City', '$Country', '$ZipCode', '$PhoneNum','$target_file')";
    echo $sql;

$result = @mysqli_query( $conn,$sql);

if ($result) {
    echo "<script>alert('CUSTOMER SAVED!');document.location='Cindex.php'</script>";
}
else{
    echo $mysqli_error();
}

}
else{
foreach ($errors as $msg) 
{ // Print each error.
    echo " - $msg<br />\n";
}
}
}
 else {
         echo "Sorry, there was an error uploading your file.";
     }


//   if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

// $query = "INSERT INTO customer (Title, LastName, FirstName, Street, City, Country, ZipCode, PhoneNum, Img) VALUES ('$Title','$LastName','$FirstName', '$Street', '$City','Country', '$ZipCode', '$PhoneNum','$target_file')";

//             echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
//           } else {
//             echo "Sorry, there was an error uploading your file.";
?>