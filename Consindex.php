<?php
session_start();
include ("includes/header.php");
include ("includes/config.php");
include ("includes/bootstrap.php");
?>
<br>
<br>

<h6> Consultation </h6>
<button style="background-color:yellow; border-color:black; color:black"><a href="consulttrigger.php">SHOW TRIGGERS &#128498;</button></a>

<div class="panel-body table-responsive">
<table class="table"> 

    <thead>
       <tr>
       <th>Consultation ID</th> 
        <th>Employee ID</th> 
        <th>Employee Name</th> 
        <th>Pet ID</th>
        <th>Pet Name</th>
        <th>Date of Consultation</th>
        <th>Fees</th>
        <th>Pet Condition</th>
        <th>Disease ID</th>
        <th>Disease Name</th>
        <th>Injury ID</th>
        <th>Injury Name</th>
        <th>Comment</th>
        <th>Edit</th>
        <th>Delete</th>
        </tr>
     </thead>
     <tbody>

<?php
if (!isset($_SESSION['EmployeeID'])){
  require("includes/login_functions.inc.php");
 echo "<script>alert('please log in to view list of consultations');document.location='login.php'</script>";
}
else {
$sql = "SELECT * FROM consultation c INNER JOIN diseases d INNER JOIN injuries i INNER JOIN employee e INNER JOIN petinfo po
ON c.employeeId = e.EmployeeID AND c.diseaseid = d.diseasenum AND c.injuryid = i.injurynum AND c.petnum = po.PetID ORDER BY c.consultID ASC";
$result = mysqli_query( $conn,$sql );
$num_rows = mysqli_num_rows( $result );
echo "There are currently $num_rows rows in the table<P>";
echo "<tr>\n";
  while ($row = mysqli_fetch_assoc($result)) {
   //echo print_r($row);  
        echo "<td>".$row['consultID']."</td>";
        echo "<td>".$row['employeeId']."</td>";
        echo "<td>".$row['lastName']. ", " .$row['firstName'] ."</td>";
        echo "<td>".$row['petnum']."</td>";
        echo "<td>".$row['petName']."</td>"; 
        echo "<td>".$row['dateconsult']."</td>";
        echo "<td>".$row['fees']."</td>";
        echo "<td>".$row['petcondition']."</td>";
        echo "<td>".$row['diseaseid']."</td>";
        echo "<td>".$row['description']."</td>"; 
        echo "<td>".$row['injuryid']."</td>";
        echo "<td>".$row['desc']."</td>"; 
        echo "<td>".$row['vcomment']."</td>";
        // echo "<td><img width = '100px' height = '100px' src =".$row['Img']."></td>";

        echo  "<ul class='action-list'>";
        echo "<td align='center'><a href='consedit.php?cust_id=".$row['consultID']."'> <i class='btn btn-primary'>Edit</a></i></td>";
        echo "<td align='center'><a href='consultdelete.php?cust_id=".$row['consultID']."'> <i class='btn btn-danger'>Delete</a></i></td>";

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