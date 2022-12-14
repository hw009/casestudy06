<header class="navbar">
   <div class="container display-flex flex-align-center">
      <div class="flex-none">
         <!--<h1><a href="index.php"><img src="images/logohorizontal.png" width="200" heights="auto" alt=""></a></h1>-->
         <h1><a href="index.php">Clayroom SF</a></h1>
      </div>
      <div class="flex-stretch"></div>

      <nav class="nav flex-none">
         <ul class="display-flex">
            <li><a href="product_list.php">SHOP</a></li>
            <li><a href="about.php">ABOUT</a></li>
            <li><a href="product_cart.php">
               <span>CART</span>
               <span class="badge"><?= makeCartBadge() ?></span>
            </a></li>
         </ul>
      </nav>
   </div>
</header>