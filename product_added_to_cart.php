<?
include_once "lib/php/functions.php";
$product = MYSQLIQuery("SELECT * FROM products WHERE id = ".$_GET['id'])[0];

$cart_product = cartItemById($_GET['id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
   
   <title>Added Classes To Cart</title>
   <? include "parts/meta.php" ?>
</head>
<body>
<? include "parts/navbar.php" ?>


<div class="container">
   <div class="card soft">
      <h2>Added <?= $product->title ?> To Cart</h2>
      <p>There are now <?= $cart_product->amount ?> of <?= $product->title ?> in your cart.</p>

      <div class="display-flex">
         <div class="flex-none">
            <h4><a href="product_list.php" class="form-button">Back to Browsing</a></h4>
         </div>
         <div class="flex-stretch"></div>
         <div class="flex-none">
            <h4><a href="product_cart.php" class="form-button">Check Cart</a></h4>
         </div>
      </div>
   </div>

</div>

   
</body>
</html>