<?php
session_start();
include ("includes/header.php");
include ("includes/config.php");
include ("includes/bootstrap.php");
?>
<br>
<br>
<h6> Pet </h6>
<button style="background-color:yellow; border-color:black; color:black"><a href="Pcreate.php">+ Add New</button></a>
<div class="panel-body table-responsive">
<table class="table"> 
    <thead>
       <tr>
       <th>Pet ID</th> 
        <th>Pet Name</th> 
        <th>Pet Owner</th>
        <th>Breed</th>
        <th>Species</th>
        <th>Color</th>
        <th>Sex</th>
        <th>Date of Birth</th>
        <th>Pet Profile</th>
        <th>Edit</th>
        <th>Delete</th>
        </tr>
     </thead>
     <tbody>
<?php
if (!isset($_SESSION['EmployeeID'])){ 
  require("includes/login_functions.inc.php");
 echo "<script>alert('please log in to view current Pet clients');document.location='login.php'</script>";
}
else {
$sql = "SELECT * FROM petinfo";
$result = mysqli_query( $conn,$sql );
$num_rows = mysqli_num_rows( $result );
echo "There are currently $num_rows rows in the table<P>";
echo "<tr>\n";
  while ($row = mysqli_fetch_assoc($result)) {
   //echo print_r($row);  
        echo "<td>".$row['PetID']."</td>";
        echo "<td>".$row['petName']."</td>";
        echo "<td>".$row['CustomerID']."</td>";
        echo "<td>".$row['breed']."</td>";
        echo "<td>".$row['species']."</td>";
        echo "<td>".$row['color']."</td>";
        echo "<td>".$row['sex']."</td>";
        echo "<td>".$row['birth']."</td>";
    
        echo "<td><img width = '100px' height = '100px' src =".$row['Img']."></td>";
        echo  "<ul class='action-list'>";
        echo "<td align='center'><a href='Pedit.php?pet_id=".$row['PetID']."'> <i class='btn btn-primary'>Edit</a></i></td>";
        echo "<td align='center'><a href='Pdelete.php?pet_id=".$row['PetID']."'> <i class='btn btn-danger'>Delete</a></i></td>";

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
include("includes/footer.php");
?>