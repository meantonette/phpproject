<?php
session_start();
include ("includes/header.php");
include ("includes/config.php");
include ("includes/bootstrap.php");
?>

<?php
if (!isset($_SESSION['EmployeeID'])){
  require("includes/login_functions.inc.php");
 echo "<script>alert('please log in to search');document.location='login.php'</script>";
}
else {
?>

<!doctype html>
<div style="width:950px; margin:auto;">
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="includes/style.css" rel="stylesheet" type="text/css">
    <title>Search Pet</title>
</head>
<body>


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h4>SEARCH PET MEDICAL HISTORY </h4>
                        
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">

                                <form action="" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search pet">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                <div class="card-header">
                                <!-- <h4>PET INFORMATION</h4>
                                </div>
                                <th>Name</th>
								<th>Breed</th>
								<th>Species</th>
                                <th>Color</th>
                                <th>Sex</th>
                                <th>birth</th>
                                </tr>
                                </thead>
                                </table>

                        <table class="table table-bordered">
                                <thead>
                                <tr>
                                <div class="card-header"> -->
                                <h4>PET MEDICAL HISTORY</h4> 
                                </div>
                                <th>Date of Consult</th>
                				<th>Condition</th>
                				<th>Disease</th>
                				<th>Injury</th>
                				<th>Comments</th>
                				<th>Fees</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    if(isset($_GET['search']))
                                    {
                                        $filtervalues = $_GET['search'];

                                        $sql = "SELECT Img FROM petinfo WHERE petName LIKE '%$filtervalues%' OR PetID LIKE '%$filtervalues%'";
                                        $result = mysqli_query( $conn,$sql );
                                        $num_rows = mysqli_num_rows( $result );
                                          while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<img width = '100px' height = '100px' class= 'center' src =".$row['Img'].">"; 
                                            }
                                            
                                        $query = "SELECT p.petName, p.Img, cs.dateconsult, cs.fees, cs.petcondition, cs.diseaseid, d.description, cs.injuryid, i.desc, cs.vcomment 
                                        FROM petinfo p INNER JOIN employee e INNER JOIN diseases d INNER JOIN injuries i INNER JOIN consultation cs ON p.PetID = cs.petnum AND cs.diseaseid = d.diseasenum 
                                        AND cs.injuryid = i.injurynum AND e.EmployeeID = cs.employeeId WHERE p.petName LIKE '%$filtervalues%' OR p.PetID LIKE '%$filtervalues%' ";

                                        // "SELECT * FROM consultation WHERE petnum LIKE '%$filtervalues%' ";
                                        
                                        // $query = "SELECT * FROM consultation WHERE CONCAT(consultID, employeeId, petnum, CustomerID, dateconsult, fees, petcondition, diseaseid, injuryid, vcomment) LIKE '%$filtervalues%' ";
                                      

										$query_run = mysqli_query($conn, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $items)
                                            {
                                                ?>
                                             
                                                <tr>
                                            
                                                    <td><?= $items['dateconsult']; ?></td>
                                                    <td><?= $items['petcondition']; ?></td>
                                                    <td><?= $items['description']; ?></td>
                                                    <td><?= $items['desc']; ?></td>
													<td><?= $items['vcomment']; ?></td>
													<td><?= $items['fees']; ?></td>
                                                </tr>
                                                <?php
                                                
                                            }
                                          
                                        }
                                        else
                                        {
                                            ?>
                                                <tr>
                                                    <td colspan="4">No Record Found</td>
                                                </tr>
                                            <?php
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script> -->
</body>
</html>
<?php
}
?>