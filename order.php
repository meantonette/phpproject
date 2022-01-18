<?php
session_start();
include ("includes/config.php");
$page_title = 'Place your Order!';
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
<title>Available Services</title>
<link href="includes/styles.css" rel="stylesheet" type="text/css">
<link href="includes/style.css" rel="stylesheet" type="text/css">
</head>
<body>

<h1>  </h1>
<h1 align ="center"> <i style="font-style: Brush Script MT, Brush Script Std, cursive; background-color: White;">ACME PRODUCTS AND SERVICES</i></h1>
<!-- <h2>Your Shopping Cart</h2> -->

<?php
if(isset($_SESSION["serv_cart"]) && count($_SESSION["serv_cart"])>0)
{
    
    echo '<div class="cart-view-table-front" id="view-cart">';
    echo '<h3>Services</h3>';
    echo '<form method="POST" action="cart_update.php">';
    echo '<table width="100%"  cellpadding="6" cellspacing="0">';
    echo '<tbody>';
    $total =0;
    $b = 0;
    foreach ($_SESSION["serv_cart"] as $cart_itm) {
        //var_dump($cart_itm);
        //exit();
        $serv_name = $cart_itm["servname"];
        // $product_qty = $cart_itm["quantity"];
        $serv_price = $cart_itm["Price"];
        // $product_color = $cart_itm["product_color"];
        $serv_code = $cart_itm["ServiceID"];
        $bg_color = ($b++%2==1) ? 'odd' : 'even'; //zebra stripe
        echo '<tr class="'.$bg_color.'">';
        // echo '<td>Qty <input type="text" size="2" maxlength="2" name="product_qty['.$product_code.']"/></td>';
        echo '<td>'.$serv_name.'</td>';
        echo '<td><input type="checkbox" name="remove_code[]" value="'.$serv_code.'" /> Remove</td>';
        echo '</tr>';
        $subtotal = ($serv_price);
        $total = ($total + $subtotal);
    }
    echo '<td colspan="4">';
    echo '<button type="submit">Update</button><a href="view_cart.php" class="button">Checkout</a>';
    echo '</td>';
    echo '</tbody>';
    echo '</table>';
    $current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';
    echo '</form>';
    echo '</div>';
}
?>

</div> 

<?php
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
$sql = "SELECT * FROM petservices";
// $sql = "SELECT i.item_id, i.description, i.img, i.sell_price FROM item i INNER JOIN stock s ON s.item_id = i.item_id ORDER BY item_id ASC";
$results = mysqli_query($conn,$sql);
if($results){ 
    $serv_item = '<ul class="products">';
//fetch results set as object and output HTML
     while ($row = mysqli_fetch_array($results)) {
        $serv_item .= <<<EOT
       <li class="product">
            <form method="POST" action="cart_update.php">
                <div class="product-content"><h3>{$row['servname']}</h3>
                <div class="product-thumb"><img src="{$row['Img']}" width=200px height=200px></div>
                <div class="product-info">
                Price: {$row['Price']} 
                <div class="product-info">
                Description: {$row['Descrip']} 
               
                <input type="hidden" name="ServiceID" value="{$row['ServiceID']}" />
                <input type="hidden" name="type" value="add" />
                <input type="hidden" name="return_url" value="{$current_url}" />
                <div align="center"><button type="submit" class="add_to_cart">Add</button></div>
                </div></div></div>
             </form>
        </li>
EOT;
}
// <fieldset>
              
// <label>
// <span>Quantity</span>
// <input type="text" size="2" maxlength="2" name="quantity" value="1" />
// </label>
// </fieldset>
  // <label>
                // <span>Color</span>
                // <select name="product_color">
                // <option value="Black">Black</option>
                // <option value="Silver">Silver</option>
                // </select>
                // </label>

$serv_item .= '</ul>';
echo $serv_item;
}
}
?>
</body>
</html>