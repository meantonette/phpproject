<?php
session_start();
include ("includes/header.php");
include ("includes/config.php");
include ("includes/bootstrap.php");
?>
<br>
<br>
<h6> Pet </h6>
<button style="background-color:yellow; border-color:black; color:black"><a href="Screate.php">+ Add New</button></a>
<div class="panel-body table-responsive">
<table class="table"> 
    <thead>
       <tr>
       <th>Service ID</th> 
        <th>Title</th> 
        <th>Description</th>
        <th>Price</th>
        <th>Service Image</th>
        <th>Edit</th>
        <th>Delete</th>
        </tr>
     </thead>
     <tbody>
       
<?php
if (!isset($_SESSION['EmployeeID'])){
  require ("includes/login_functions.inc.php");
 echo "<script>alert('please log in to view current services');document.location='login.php'</script>";
}
else {
$sql = "SELECT * FROM petservices";
$result = mysqli_query( $conn,$sql );
$num_rows = mysqli_num_rows( $result );
echo "There are currently $num_rows rows in the table<P>";
echo "<tr>\n";
  while ($row = mysqli_fetch_assoc($result)) {
   //echo print_r($row);  
        echo "<td>".$row['ServiceID']."</td>";
        echo "<td>".$row['servname']."</td>";
        echo "<td>".$row['Descrip']."</td>";
        echo "<td>".$row['Price']."</td>";
        echo "<td><img width = '100px' height = '100px' src =".$row['Img']."></td>";
        
        echo  "<ul class='action-list'>";
        echo "<td align='center'><a href='Sedit.php?serv_id=".$row['ServiceID']."'> <i class='btn btn-primary'>Edit</a></i></td>";
        echo "<td align='center'><a href='Sdelete.php?serv_id=".$row['ServiceID']."'> <i class='btn btn-danger'>Delete</a></i></td>";
        
      echo "</ul><i class='action-list'> \n";          
        echo "</tr>\n"; 
      }
}
   //  mysqli_free_result($result);
    mysqli_close( $conn );
    ?>

   </tbody>
   </table>
   </div>

   <?php
   include ("includes/footer.php");
   ?>