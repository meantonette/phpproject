<?php
session_start();
include "includes/bootstrap.php";
?>
<?php 
$message = '';
if(isset($_POST["import"]))
{
 if($_FILES["database"]["name"] != '')
 {
  $array = explode(".", $_FILES["database"]["name"]);
  $extension = end($array);
  if($extension == 'sql')
  {
   include "includes/config.php";
   $output = '';
   $count = 0;
   $file_data = file($_FILES["database"]["tmp_name"]);
   foreach($file_data as $row)
   {
    $start_character = substr(trim($row), 0, 2);
    if($start_character != '--' || $start_character != '/*' || $start_character != '//' || $row != '')
    {
     $output = $output . $row;
     $end_character = substr(trim($row), -1, 1);
     if($end_character == ';')
     {
      if(!mysqli_query($conn, $output))
      {
       $count++;
      }
      $output = '';
     }
    }
   }
   if($count > 0)
   {
    
    echo "<script>alert('Database Successfully Imported!');document.location='Home.php'</script>";
   }
  }
  else
  {
  
   echo "<script>alert('Invalid File!');document.location='Restore.php'</script>";
  }
 }
 else
 {

  echo "<script>alert('Please Select Sql File!');document.location='Restore.php'</script>";
 }
}
?>

<!DOCTYPE html>  
<html>  
 <head>  
  <title>RESTORE DATABASE</title>  
 </head>  
 <link rel="stylesheet" href="includes/style.css">
 <style>
   .div-2 {
        height: 400px;
        margin: auto;
        width: 600px;
        border: 3px solid;
        text-align: center;
        background-color: #CAAEFF;
    }
</style>
 <body>  
 <div class="div-2">
  <br> 
  <div class="container">  
  <center><h1>&#x1F4C1;</h1></center>
  <h2 align="center"><b><font color='red'>Restore your Database</h2></font></b>
   <div><?php echo $message; ?></div>
   <form method="post" enctype="multipart/form-data">
   <font size="+1.5"><p align='center'> <h3>Input your database file</label></h3></p></font>
   <br>
   <input type="file" name="database"/>
    <br>
    <br>
    <div class="form-group">
    <input type="submit" name="import" class="btn btn-info" value="Restore" />
   </form>
  </div>  
 </body>  
</html>