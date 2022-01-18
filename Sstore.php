
<?php
include "includes/config.php";
include "includes/bootstrap.php";
?>

<?php
//print_r($_POST);
$errors = array(); 

if ($_POST['submit'] == "save"){ 

    if (isset($_POST['submit'])) {
        if (empty($_POST['servname'])) {
       $errors[] = "<script>alert('Input Title');document.location='Screate.php'</script>";
       
        } else { 
            $Title = $_POST['servname'];
        }
    }
    
        if (isset($_POST['submit'])) {
        if (empty($_POST['Descrip'])) {
       $errors[] = "<script>alert('Input the Description');document.location='Screate.php'</script>";
        } else { 
            $Description = $_POST['Descrip'];
        }
    }

    if (isset($_POST['submit'])) {
        if (empty($_POST['Price'])) {
       $errors[] = "<script>alert('Input the Price');document.location='Screate.php'</script>";
        } else { 
            $Price = $_POST['Price'];
        }
    }

$target_dir = "UploadService/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
       // echo "File is an image - " . $check["mime"] . "."; comment mo toh panira sa buhay toh ahha
        $uploadOk = 1;
    } else {
        echo "<script>alert('File is not an image.');document.location='Screate.php'</script>";
        $uploadOk = 0;
    }
//Check if file already exists

if (file_exists($target_file)) {
    echo "<script>alert('Sorry, file already exists.');document.location='Screate.php'</script>";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "<script>alert('Sorry, your file is too large.');document.location='Screate.php'</script>";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png" && $imageFileType != "gif" ) {
    echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');document.location='Screate.php'</script>";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "<script>alert('Sorry, your file was not uploaded.');document.location='Screate.php'</script>";
// if everything is ok, try to upload file
} 

if(empty($errors)){ //continue

    (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)); 
    
    echo nl2br("The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.\n");

    $sql = "INSERT INTO petservices(servname, Descrip, Price, Img) VALUES ('$Title','$Description', '$Price', '$target_file')";
    echo $sql;

$result = @mysqli_query( $conn,$sql);

if ($result) {
    echo "<script>alert('PET SERVICE SAVED!');document.location='Sindex.php'</script>";
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

?>