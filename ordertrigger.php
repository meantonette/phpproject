<?php
session_start();
include ("includes/header.php");
include ("includes/config.php");
include ("includes/bootstrap.php");
?>
<br>
<br>

<h6> Consultation Triggers </h6>
<div class="panel-body table-responsive">
<table class="table"> 

    <thead>
       <tr>
       <th>Trigger ID</th> 
       <th>Service Order Info ID</th> 
        <th>Employee ID</th> 
        <th>Schedule</th> 
        </tr>
     </thead>
     <tbody>

<?php
if (!isset($_SESSION['EmployeeID'])){
  require("includes/login_functions.inc.php");
 echo "<script>alert('please log in to view orders trigger');document.location='login.php'</script>";
}
else {
$sql = "SELECT * FROM transac_trigger";
$result = mysqli_query( $conn,$sql );
$num_rows = mysqli_num_rows( $result );
echo "There are currently $num_rows rows in the table<P>";
echo "<tr>\n";
  while ($row = mysqli_fetch_assoc($result)) {
   //echo print_r($row);  
   echo "<td>".$row['Trigger_id']."</td>";
   echo "<td>".$row['servordinfoID']."</td>";
   echo "<td>".$row['employID']."</td>";
   echo "<td>".$row['sched']."</td>";
   
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