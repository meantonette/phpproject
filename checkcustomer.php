<?php
session_start();
include "includes/header.php";
?>
<!DOCTYPE html>
<html>

<head>
    <br>
    <br>
    <br>
    <br>
    
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Pick A Pet</title>
    <link href="includes/styles.css" rel="stylesheet" type="text/css">
    

</head>

<body>

<h1 align='center'>Choose your Pet</h1>
    <?php
    if (isset($_SESSION["cartt"]) && count($_SESSION["cartt"]) > 0) {
        echo '<div class="cart-view-table-back" id="view-cart">'; 
        echo '<h3>Your Choosen Pets</h3>';
        echo '<form method="POST" action="cart_update2.php">'; 
        echo '<table width="100%"  cellpadding="6" cellspacing="0">';
        echo '<tbody>';

        $b = 0;
        foreach ($_SESSION["cartt"] as $cart_itm) {
            //var_dump($cart_itm);
            //exit();
            $petName = $cart_itm["petName"];
            $PetID = $cart_itm["PetID"];
            $bg_color = ($b++ % 2 == 1) ? 'odd' : 'even'; //zebra stripe
            echo '<tr class="' . $bg_color . '">';
            echo '<td>' . $petName . '</td>';
            //echo '<td><input type="text" value="'.$Cust_id.'"></td>';
            echo '<td><input type="checkbox" name="remove_code[]" value="' . $PetID . '" /> Remove</td>';
            echo '</tr>';
            //$subtotal = ($product_price * $product_qty);
            //$total = ($total + $subtotal);
        }
        echo '<td colspan="4">';
        echo '<button type="submit">Update</button>
        <a href="order.php" class="button">Go To Order</a>';
        echo '</td>';
        echo '</tbody>';
        echo '</table>';

        $current_url = urlencode($url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
        echo '<input type="hidden" name="return_url" value="' . $current_url . '" />';
        echo '</form>';
        echo '</div>';
    }
    ?>

    <?php
    //var_dump($_SESSION);
    if (!isset($_SESSION['CustomerID'])) {
        require('includes/check.inc.php');
        redirect_user();
    }
    //include ('transac.php');
    include "includes/config.php";

    $current_url = urlencode($url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    $result = mysqli_query($conn, "SELECT p.PetID AS PetID , p.petName AS petName, p.Img AS Img FROM petinfo p INNER JOIN customer c ON p.CustomerID  = c.CustomerID  WHERE p.CustomerID  = " .   $_SESSION['CustomerID']);
    if ($result) {
        $service = '<ul class="products">';
        while ($row = mysqli_fetch_array($result)) {
            $service .= <<<QWE
    <li class="product">
        <form method="POST" action="cart_update2.php">
            <div class="product-thumb"><img width=200px height=200px src={$row['Img']}></div>
            <div class="product-info">Name: {$row['petName']}
            <br></br>
          <input type="hidden" name="PetID" value="{$row['PetID']}" />
            <input type="hidden" name="type" value="add" /> 
            <input type="hidden" name="return_url" value="{$current_url}" />
            <div align="center"><button type="  " class="add_to_cart">Choose</button></div>
            </div></div>
         </form>
    </li>
QWE;
        }
        $service .= '</ul>';
        echo $service;
    }
    ?>
</body>

</html>