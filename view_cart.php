<?php
session_start();
include ("includes/config.php");
$page_title = 'View your Cart';
include ('includes/header.php');
// include ('includes/bootstrap.php');
?>
<?php
if (!isset($_SESSION['EmployeeID'])){
  require("includes/login_functions.inc.php");
 echo "<script>alert('please log in to shop');document.location='login.php'</script>";
}
else {
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View shopping cart</title>
<link href="includes/styles.css" rel="stylesheet" type="text/css"></head>
<body>
<br>
<br>
<br>
<h1 align="center">SHOPPING CART</h1>
<div class="cart-view-table-back">
<form method="post" action="cart_update.php">
<table class="center" width="100%"  cellpadding="6" cellspacing="0"><thead><tr><th>Name</th><th>Price</th><th>Remove</th></tr></thead>
  <tbody>

  <?php
// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";
if(isset($_SESSION["serv_cart"])) //check session var
    {
      $total = 0; //set initial total value
      $b = 0; //var for zebra stripe table 
foreach ($_SESSION["serv_cart"] as $cart_itm)
        {
//set variables to use in content below
          $serv_name = $cart_itm["servname"];
          // $product_qty = $cart_itm["quantity"];
          $serv_price = $cart_itm["Price"];
          $serv_code = $cart_itm["ServiceID"];
          $petnum = $cart_itm["PetID"];
        //   $product_color = $cart_itm["product_color"];
          // $subtotal = ($serv_price); //calculate Price x Qty
          $bg_color = ($b++%2==1) ? 'odd' : 'even'; //class for zebra stripe 
   echo '<tr class="'.$bg_color.'">';
  //  value="'.$product_qty.'" 
  // echo '<td><input type="text" size="2" maxlength="2" name="product_qty['.$product_code.']"/></td>';
  echo '<td>'.$serv_name.'</td>';
  echo '<td>'.$serv_price.'</td>';
  // echo '<td>'.$subtotal.'</td>';
  echo '<td><input type="checkbox" name="remove_code[]" value="'.$serv_code.'" /></td>';
  echo '</tr>';
$total = ($total + $serv_price); //add subtotal to total var
        }
}
?>

    <tr><td colspan="5"><span style="float:right;text-align: right;">Amount Payable : <?php echo sprintf("%01.2f", $total);?></span></td></tr>
    <tr><td colspan="5"><a href="order.php" class="button">Add More Items</a>
    <button type="submit">Update</button></td>
<td colspan="5"><a href="checkout.php" class="button">checkout</a></td>
</tr>
</tbody>
</table>
<input type="hidden" name="return_url" value="<?php 
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
echo $current_url; ?>" />
</form>
</div>
</body>
</html>
<?php
}
?>