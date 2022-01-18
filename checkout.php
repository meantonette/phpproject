<?php
error_reporting(0);
session_start();

// include("includes/bootstrap.php");
include("includes/config.php");
$page_title = 'Check Out!';
//include ('includes/header.php');
 if (!isset($_SESSION['EmployeeID']) ) {
 require ('includes/login_functions.inc.php');
//  redirect_user('Fail.php');
 echo "<script>alert('PLEASE LOG IN FIRST! THANK YOU');document.location='login.php'</script>";
}
//print_r($_SESSION);
//  try
else{
mysqli_query($conn,'START TRANSACTION');

$q1 = 'INSERT INTO servorderinfo(employID, sched) VALUES ( ?, NOW())';
$eID =  $_SESSION['EmployeeID'];
// $mopID = 1;
// $charged = $total;
// 50.00;
$flag = true;

$stmt1 = mysqli_prepare($conn, $q1);
mysqli_stmt_bind_param($stmt1, 'i', $eID);
mysqli_stmt_execute($stmt1);

$servinfoID = mysqli_insert_id($conn);

$q2 = 'INSERT INTO servorderline(servordinfoID , servID, petID) VALUES ( ?, ?, ?)';

$stmt2 = mysqli_prepare($conn, $q2);
mysqli_stmt_bind_param($stmt2, 'iii', $servinfoID, $serv_code, $PetID);

// $q3 = 'UPDATE avails SET avail = avail + ? where servID = ?';
// $stmt3 = mysqli_prepare($conn, $q3);
// mysqli_stmt_bind_param($stmt3, 'ii', $product_qty,$product_code);
// print_r($_SESSION["cart_products"]);

foreach ($_SESSION["cartt"] as $cart_itm) {
  $petName = $cart_itm["petName"];
  $PetID  = $cart_itm["PetID"];


foreach ($_SESSION["serv_cart"] as $cart_itm){
//set variables to use in content below
  // $product_qty = $cart_itm["quantity"];
  $serv_price = $cart_itm["Price"];
  $serv_code = $cart_itm["ServiceID"];
  //$petnum = $cart_itm["PetID"];
  // $subtotal = ($serv_price);
  //$total = ($total + $serv_price); 

//   $product_color = $cart_itm["product_color"];
  // print_r($product_code);

  mysqli_stmt_execute($stmt2);

  // mysqli_stmt_execute($stmt3);
  // && (mysqli_stmt_affected_rows($stmt3) > 0)

    if ((mysqli_stmt_affected_rows($stmt2) > 0)) {

      if ($flag == true){
        mysqli_commit($conn);
         // unset($_SESSION['cart_products']);
         //echo "<script>alert('THANK YOU FOR CHOOSING ACME!');document.location='Home.php'</script>";
       }
       else {
        mysqli_rollback($conn);
        echo "<script>alert('ERROR!');document.location='Home.php'</script>";
        }
    }
  }
}
        unset($_SESSION['cartt']);
        unset($_SESSION['serv_cart']);
} 



//receipt

echo '<p class="centered">RECEIPT</p>';
$d = 'CALL grooming('.$servinfoID.')';
          $call = mysqli_query($conn, $d);
while ($rows = mysqli_fetch_array($call))
          { 

echo '<link rel="stylesheet" href="includes/receiptstyle.css">
          
<div id="invoice-POS">
<style>
p.dashed {border-style: dashed;} 

p.top {
  border-top-style: dotted;
  border-right-style: none;
  border-bottom-style: none;
  border-left-style: none;
}

p.under {
  border-top-style: none;
  border-right-style: none;
  border-bottom-style: dotted;
  border-left-style: none;
}

</style>

<p class="dashed">
<center id="top">
<div class="logo"></div>
<div class="info"> 
<h1> &#128062; ACME &#128062;</h1>
</h3>Pet clinic and grooming services</h3>
</div>
</center>

<div id="mid">
<div class="info">
<p class="top">
</p>
  <h2>Transaction Information: </h2>
  <h4><center>Date Service: '.$rows['sched'].' | &emsp; Owner Name: '.$rows['FirstName'].' '.$rows['LastName'].' | &emsp; Employee Name: '.$rows['firstName'].' '.$rows['lastName'].'</center></h4>
<p class="under">
</p>
</div>
</div>
<div id="bot">

<div id="table">
<h2>Order: </h2>
						<table>
            <thead>
							<tr class="tabletitle">
								<td class="item"><h2>Services</h2></td>
								<td class="Hours"><h2>Pet Name</h2></td>
								<td class="Rate"><h2>Fee</h2></td>
							</tr>
                </thead>

              <tr class="service">
								<td class="tableitem"><p class="itemtext"> '.$rows['servname'].'</p></td>
								<td class="tableitem"><p class="itemtext">'.$rows['petName'].'</p></td>
								<td class="tableitem"><p class="itemtext"> ₱ '.$rows['Price'].'</p></td>
							</tr>

            </table>
            </div><!--End Table-->
  
            <div id="legalcopy">
              <p class="legal"><strong>Thank you for choosing ACME!</strong>  Payment is expected within 31 days; please process this invoice within that time. There will be a 5% interest charge per month on late invoices. 
              </p>
            </div>
  
          </div><!--End InvoiceBot-->
    </div><!--End Invoice-->

            </p> 
        </div>';
          }
          // echo '<p class="centered"><button><strong>Print</strong></button></p>';

        //   <tr class="tabletitle">
        //   <td></td>
        //   // <td class="Rate"><h2>Total</h2></td>
        //   // <td class="payment"><h2> ₱ '.$rows['Price'].'</h2></td>
        // </tr>
?>
</body>
</html>
