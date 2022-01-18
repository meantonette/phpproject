<?php
session_start();
include ("includes/header.php");
include ("includes/config.php");
include ("includes/bootstrap.php");
?>
<br>
<br>
<h6> Employee </h6>
<button style="background-color:yellow; border-color:black; color:black"><a href="signup.php">+ Add New</button></a>
<div class="panel-body table-responsive">
<table class="table">  

    <thead>
       <tr>
       <th>Employee ID</th> 
        <th>Last Name</th>
        <th>First Name</th>
        <th>Email Address</th>
        <th>Password</th>
        <th>Hired Date</th>
        <th>Customer Profile</th>
        <th>Edit</th>
        <th>Delete</th>
        </tr>
     </thead>
     <tbody>

<?php
if (!isset($_SESSION['EmployeeID'])){
  require("includes/login_functions.inc.php");
 echo "<script>alert('please log in to view current employee');document.location='login.php'</script>";

}
else {
$sql = "SELECT * FROM employee";
$result = mysqli_query( $conn,$sql );
$num_rows = mysqli_num_rows( $result );
echo "There are currently $num_rows rows in the table<P>";
echo "<tr>\n";
  while ($row = mysqli_fetch_assoc($result)) {
   //echo print_r($row);  
        echo "<td>".$row['EmployeeID']."</td>";
        echo "<td>".$row['lastName']."</td>";
        echo "<td>".$row['firstName']."</td>";
        echo "<td>".$row['email']."</td>";
        echo "<td>".$row['pass']."</td>";
        echo "<td>".$row['hiredDate']."</td>";
        echo "<td><img width = '100px' height = '100px' src =".$row['Img']."></td>";
        echo  "<ul class='action-list'>";
        echo "<td align='center'><a href='Eedit.php?cust_id=".$row['EmployeeID']."'> <i class='btn btn-primary'>Edit</a></i></td>";
        echo "<td align='center'><a href='Edelete.php?cust_id=".$row['EmployeeID']."'> <i class='btn btn-danger'>Delete</a></i></td>";
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