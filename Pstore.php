
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
        if (empty($_POST['petName'])) {
       $errors[] = "<script>alert('Input Pet Name');document.location='Pcreate.php'</script>";
       
        } else { 
            $pName = $_POST['petName'];
        }
    }
    
        if (isset($_POST['submit'])) {
        if (empty($_POST['petowner'])) {
       $errors[] = "<script>alert('Input Pet Owner name');document.location='Pcreate.php'</script>";
        } else { 
            $powner = $_POST['petowner'];
        }
    }
    
        if (isset($_POST['submit'])) { 
        if (empty($_POST['breed'])) { 
        $errors[] = "<script>alert('Input Breed');document.location='Pcreate.php'</script>"; 
        } else { 
            $pbreed = $_POST['breed']; 
        }
    }
    
    if (isset($_POST['submit'])) {
        if (empty($_POST['species'])) {
       $errors[] = "<script>alert('Input your pet species');document.location='Pcreate.php'</script>";
        } else { 
            $pspec = $_POST['species'];
        }
    }
    
    if (isset($_POST['submit'])) {
        if (empty($_POST['color'])) {
       $errors[] = "<script>alert('Input your pet color');document.location='Pcreate.php'</script>";
        } else { 
            $pcolor = $_POST['color'];
        }
    }
    
    if (isset($_POST['submit'])) {
        if (empty($_POST['sex'])) {
       $errors[] = "<script>alert('Input your pet sex');document.location='Pcreate.php'</script>";
        } else { 
            $psex = $_POST['sex'];
        }
    }
    
    if (isset($_POST['submit'])) {  
        if (empty($_POST['birth'])) {
       $errors[] = "<script>alert('Input your pet date of birth');document.location='Pcreate.php'</script>";
        } else { 
            $pbirth = $_POST['birth'];
        }
    }
    
$target_dir = "././UploadPet/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "<script>alert('File is not an image.');document.location='Pcreate.php'</script>";
        $uploadOk = 0;
    }
//Check if file already exists

if (file_exists($target_file)) {
    echo "<script>alert('Sorry, file already exists.');document.location='Pcreate.php'</script>";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "<script>alert('Sorry, your file is too large.');document.location='Pcreate.php'</script>";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png" && $imageFileType != "gif" ) {
    echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');document.location='Pcreate.php'</script>";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "<script>alert('Sorry, your file was not uploaded.');document.location='Pcreate.php'</script>";
// if everything is ok, try to upload file
} 

if(empty($errors)){ //continue

    (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)); 
    
    echo nl2br("The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.\n");

    $sql = "INSERT INTO petinfo(petName, CustomerID, breed, species, color, sex, birth, Img) VALUES ('$pName','$powner','$pbreed', '$pspec', '$pcolor', '$psex', '$pbirth','$target_file')";
    echo $sql;

$result = @mysqli_query( $conn,$sql);

if ($result) {
    echo "<script>alert('PET SAVED!');document.location='Pindex.php'</script>";
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