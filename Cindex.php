<?php
session_start();
include ("includes/header.php");
include ("includes/config.php");
include ("includes/bootstrap.php");
?>
<br>
<br>

<h6> Customers </h6>
<button style="background-color:yellow; border-color:black; color:black"><a href="Ccreate.php">+ Add New</button></a>
<div class="panel-body table-responsive">
<table class="table"> 

    <thead>
       <tr>
       <th>Customer ID</th> 
        <th>Title</th> 
        <th>Last Name</th>
        <th>First Name</th>
        <th>Street</th>
        <th>City</th>
        <th>Country</th>
        <th>Zip Code</th>
        <th>Phone Number</th>
        <th>Customer Profile</th>
        <th>Edit</th>
        <th>Delete</th>
        </tr>
     </thead>
     <tbody>

<?php
if (!isset($_SESSION['EmployeeID'])){
  require("includes/login_functions.inc.php");
 echo "<script>alert('please log in to view current customers');document.location='login.php'</script>";
}
else {
$sql = "SELECT * FROM customer";
$result = mysqli_query( $conn,$sql );
$num_rows = mysqli_num_rows( $result );
echo "There are currently $num_rows rows in the table<P>";
echo "<tr>\n";
  while ($row = mysqli_fetch_assoc($result)) {
   //echo print_r($row);  
        echo "<td>".$row['CustomerID']."</td>";
        echo "<td>".$row['Title']."</td>";
        echo "<td>".$row['LastName']."</td>"; 
        echo "<td>".$row['FirstName']."</td>";
        echo "<td>".$row['Street']."</td>";
        echo "<td>".$row['City']."</td>";
        echo "<td>".$row['Country']."</td>";
        echo "<td>".$row['ZipCode']."</td>";
        echo "<td>".$row['PhoneNum']."</td>";
        echo "<td><img width = '100px' height = '100px' src =".$row['Img']."></td>";

        echo  "<ul class='action-list'>";
        echo "<td align='center'><a href='Cedit.php?cust_id=".$row['CustomerID']."'> <i class='btn btn-primary'>Edit</a></i></td>";
        echo "<td align='center'><a href='Cdelete.php?cust_id=".$row['CustomerID']."'> <i class='btn btn-danger'>Delete</a></i></td>";

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