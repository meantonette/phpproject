<?php
session_start();
include ("includes/header.php");
include ("includes/config.php");
include ("includes/bootstrap.php");
?>
<br>
<br>

<h6> Orders </h6>
<button style="background-color:yellow; border-color:black; color:black"><a href="ordertrigger.php">SHOW TRIGGERS &#128498;</button></a>

<div class="panel-body table-responsive">
<table class="table"> 

    <thead>
       <tr>
       <th>Service Order Info ID</th> 
        <th>Employee ID</th> 
        <th>Employee Name</th>
        <th>Schedule</th> 

        <th>Edit</th>
        <th>Delete</th>
        </tr>
     </thead>
     <tbody>

<?php
if (!isset($_SESSION['EmployeeID'])){
  require("includes/login_functions.inc.php");
 echo "<script>alert('please log in to view list of orders');document.location='login.php'</script>";
}
else {
$sql = "SELECT * FROM servorderinfo so INNER JOIN employee e ON so.employID = e.EmployeeID";
$result = mysqli_query( $conn,$sql );
$num_rows = mysqli_num_rows( $result );
echo "There are currently $num_rows rows in the table<P>";
echo "<tr>\n";
  while ($row = mysqli_fetch_assoc($result)) {
   //echo print_r($row);  
        echo "<td>".$row['servordinfoID']."</td>";
        echo "<td>".$row['employID']."</td>";
        echo "<td>".$row['lastName']. ", " .$row['firstName'] ."</td>";
        echo "<td>".$row['sched']."</td>";
       
        echo  "<ul class='action-list'>";
        echo "<td align='left'><a href='ordedit.php?cust_id=".$row['servordinfoID']."'> <i class='btn btn-primary'>Edit</a></i></td>";
        echo "<td align='left'><a href='orddelete.php?cust_id=".$row['servordinfoID']."'> <i class='btn btn-danger'>Delete</a></i></td>";

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