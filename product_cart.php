<?
include_once "lib/php/functions.php";
include_once "parts/templates.php";

$cart = getCartItems();
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <title>Classes Cart</title>
   <? include "parts/meta.php"; ?>
</head>
<body>
   <? include "parts/navbar.php"; ?>

   <div class="container">
      <div class="grid gap">
         <div class="col-xs-12 col-md-8">
            <div class="card soft">
               <h2>Classes Cart</h2>
               <div class="card-section">
                  <h5>
                  <?
                     echo array_reduce($cart,'makeCartList');
                  ?>
                  </h5>
               </div>
            </div>
            
         </div>
         <div class="col-xs-12 col-md-4">
            <div class="card soft flat">
               <div class="card-section">
                  <h2>Totals</h2>
               </div>
               <?= cartTotals() ?>
            </div>
         </div>
      </div>
   </div>
</body>
</html>