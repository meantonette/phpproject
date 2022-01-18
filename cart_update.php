<?php
session_start();
error_reporting(0);
include ("includes/config.php");
$page_title = 'Cart Update';
include ('includes/header.php');
//add product to session or create new one

// && $_POST["quantity"] > 0
if(isset($_POST["type"]) && $_POST["type"]=='add')
{
    foreach($_POST as $key => $value){ //add all post vars to new_product array
        $new_serv[$key] = $value;
    }
//var_dump($new_product);
//exit();
//remove unecessary vars
unset($new_serv['type']);
unset($new_serv['return_url']);
//var_dump($new_product);
//exit(); 
  //we need to get product name and price from database.
    $sql = "SELECT * FROM petservices where ServiceID = ". $new_serv['ServiceID'];
    $result = mysqli_query( $conn, $sql);
 //echo $result;
 $num_rows = mysqli_num_rows( $result );
//echo "There are currently $num_rows rows in the table<P>";
//echo "<table border=1>\n";
  while ($row = mysqli_fetch_array($result)) {  
//fetch product name, price from db and add to new_product array
        $new_serv["servname"] = $row['servname']; 
        $new_serv["Price"] = $row['Price'];
        // var_dump($new_serv);
// exit();
        if(isset($_SESSION["serv_cart"])){  //if session var already exist
            if(isset($_SESSION["serv_cart"][$new_serv['ServiceID']])) //check item exist in products array
            {
                unset($_SESSION["serv_cart"][$new_serv['ServiceID']]); //unset old array item
                var_dump($_SESSION["serv_cart"]);
                exit();
            }           
        }
        $_SESSION["serv_cart"][$new_serv['ServiceID']] = $new_serv; //update or create product session with new item  
        //var_dump($_SESSION["serv_cart"]);
        //exit();
    } 
}

//update or remove items 
// isset($_POST["product_qty"]) || 
if(isset($_POST["remove_code"]))
{
// //update item quantity in product session
// if(isset($_POST["product_qty"]) && is_array($_POST["product_qty"])){
//     echo "<pre>";
//      print_r($_POST);
//      //print_r($new_product);
//      echo "</pre>";
// foreach($_POST["product_qty"] as $key => $value){
// if(is_numeric($value)){
// $_SESSION["serv_cart"][$key]["quantity"] = $value ;
// }
// }
// }
//remove an item from product session
if(isset($_POST["remove_code"]) && is_array($_POST["remove_code"])){
foreach($_POST["remove_code"] as $key){
    echo $key;
unset($_SESSION["serv_cart"][$key]);
}
}
}
echo "<pre>";
     print_r($_SESSION);
     //print_r($new_product);
     echo "</pre>";
//back to return url
//$return_url = (isset($_POST["return_url"]))?urldecode($_POST["return_url"]):''; //return url

echo "<script>alert('Added/removed!');document.location='order.php'</script>";
//header('Location:'.$return_url);
?>