<?php
include "includes/config.php";
print_r($_POST);
if ($_POST['submit'] ==  "update"){
$pName = $_POST['petName'];
$powner = $_POST['CustomerID'];
$pbreed = $_POST['breed'];
$pspec = $_POST['species'];
$pcolor = $_POST['color'];
$psex = $_POST['sex'];
$pbirth = $_POST['birth'];

$target_dir = "././UploadPet/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
// Check if file already exists
if (file_exists($target_file)) {
    unlink($target_file);
    //$uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} 

elseif (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
           $sql = "UPDATE petinfo set petName='$pName', CustomerID = '$powner', breed = '$pbreed', species = '$pspec', color = '$pcolor', sex = '$psex', birth = '$pbirth', Img = '$target_file' 
           WHERE PetID=".$_POST['PetID'];
        echo $sql;
 $result = mysqli_query( $conn,$sql);
 if ($result) {
   header("location: Pindex.php");
 }
 else{
   echo mysqli_error();
 }
     }
 else {
         echo "Sorry, there was an error uploading your file.";
     }
}
?>