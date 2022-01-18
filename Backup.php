<?php
session_start();
include "includes/bootstrap.php";
?>

<?php
$connect = new PDO("mysql:host=localhost;dbname=dbmedproj", "root", "");
$get_all_table_query = "SHOW TABLES";
$statement = $connect->prepare($get_all_table_query);
$statement->execute();
$result = $statement->fetchAll();

if(isset($_POST['table']))
{
 $output = '';
 foreach($_POST["table"] as $table)
 {
  $show_table_query = "SHOW CREATE TABLE " . $table . "";
  $statement = $connect->prepare($show_table_query);
  $statement->execute();
  $show_table_result = $statement->fetchAll();

  foreach($show_table_result as $show_table_row)
  {
   $output .= "\n\n" . $show_table_row["Create Table"] . ";\n\n";
  }
  $select_query = "SELECT * FROM " . $table . "";
  $statement = $connect->prepare($select_query);
  $statement->execute();
  $total_row = $statement->rowCount();

  for($count=0; $count<$total_row; $count++)
  {
   $single_result = $statement->fetch(PDO::FETCH_ASSOC);
   $table_column_array = array_keys($single_result);
   $table_value_array = array_values($single_result);
   $output .= "\nINSERT INTO $table (";
   $output .= "" . implode(", ", $table_column_array) . ") VALUES (";
   $output .= "'" . implode("','", $table_value_array) . "');\n";
  }
 }
 $file_name = 'Magic' . '.sql';
 $file_handle = fopen($file_name, 'w+');
 fwrite($file_handle, $output);
 fclose($file_handle);
 header('Content-Description: File Transfer');
 header('Content-Type: application/octet-stream');
 header('Content-Disposition: attachment; filename=' . basename($file_name));
 header('Content-Transfer-Encoding: binary');
 header('Expires: 0');
 header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file_name));
    ob_clean();
    flush();
    readfile($file_name);
    unlink($file_name);
    
}

?>

<!DOCTYPE html>
<html>
 <head>
  <title>BACKUP</title>
 </head>

 <link rel="stylesheet" href="includes/style.css">
 <style>
   .div-2 {
        height: 800px;
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
  <br>
  <br>
  <div class="container">
   <div class="row">
    <form method="POST" id="export_form">
    <center><h1>&#x1F4C2;</h1></center>
    <h2 align="center"><b><font color='red'>Choose the Tables to be backed up.</h2></font></b>
    <!-- <font size="+1.5"><p align='center'> <h3>Select Tables to backup</h3> </p></font> -->
    <?php
    foreach($result as $table)
    {
    ?>
     <div class="checkbox">
     <font size="+1.85"><p align='center'><label><input type="checkbox" class="checkbox_table" name="table[]" value="<?php echo $table["Tables_in_dbmedproj"]; ?>" /> <?php echo $table["Tables_in_dbmedproj"]; ?></label></p></font>
     </div>
    <?php
    }
    ?>
     <div class="form-group">
      <input type="submit" name="submit" id="submit" class="btn btn-info" value="Backup" />
      </div>
     </div>
    </form>
   </div>
  </div>
 </body>
</html>
<script>
$(document).ready(function(){
 $('#submit').click(function(){
  var count = 0;
  $('.checkbox_table').each(function(){
   if($(this).is(':checked'))
   {
    count = count + 1;
   }
  });
  if(count > 0)
  {
   $('#export_form').submit();
  }
  else
  {
   alert("Please Select Atleast one table for Export");
   return false;
  }

 });
});

</script>
