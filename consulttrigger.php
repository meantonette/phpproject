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
        <th>Consultation ID</th> 
        <th>Employee ID</th>
        <th>Pet ID</th>
        <th>Date of Consultation</th>
        <th>Fees</th>
        <th>Pet Condition</th>
        <th>Disease ID</th>
        <th>Injury ID</th>
        <th>Observation/Comment</th>
        </tr>
     </thead>
     <tbody>

<?php
if (!isset($_SESSION['EmployeeID'])){
  require("includes/login_functions.inc.php");
 echo "<script>alert('please log in to view consultations trigger');document.location='login.php'</script>";
}
else {
$sql = "SELECT * FROM consult_trigger";
$result = mysqli_query( $conn,$sql );
$num_rows = mysqli_num_rows( $result );
echo "There are currently $num_rows rows in the table<P>";
echo "<tr>\n";
  while ($row = mysqli_fetch_assoc($result)) {
   //echo print_r($row);  
   echo "<td>".$row['Trigger_ID']."</td>";
   echo "<td>".$row['consultID']."</td>";
   echo "<td>".$row['employeeId']."</td>";
   echo "<td>".$row['petnum']."</td>";
   echo "<td>".$row['dateconsult']."</td>";
   echo "<td>".$row['fees']."</td>";
   echo "<td>".$row['petcondition']."</td>";
   echo "<td>".$row['diseaseid']."</td>";
   echo "<td>".$row['injuryid']."</td>";
   echo "<td>".$row['vcomment']."</td>";   
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