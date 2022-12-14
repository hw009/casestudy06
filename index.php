<?
include_once "lib/php/functions.php";
include_once "parts/templates.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <title>Store</title>
   <?php include "parts/meta.php" ?>
</head>
<body>

   <?php include "parts/navbar.php" ?>
   <div class="view-window" style="background-image:url(images/clay_01.jpg)">
      <h2>Community Pottery Classes</h2>
   </div>

   <div class="container">
      <div class="card soft text-center">
         <h2>Welcome to Clayroom Studio</h2>
      </div>
   </div>
   <div class="container">
      <h2>Pottery Classes</h2>
      <? recommendCategory('pottery') ?>
   </div>
   <div class="container">
      <h2>Woodwork Classes</h2>
      <? recommendCategory('woodwork') ?>
   </div>
</body>
</html> 