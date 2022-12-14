<?

function makeProductList($r,$o) {
return $r.<<<HTML
<div class="col-xs-12 col-md-4">
   <a href="product_item.php?id=$o->id" class="product-item">
      <figure>
         <div class="product-image">
            <img src="images/store/$o->image_thumb" alt="">
         </div>
         <figcaption class="product-description">
            <div class="product-price">&dollar;$o->price</div>
            <div class="product-title">$o->title</div>
         </figcaption>
      </figure>
   </a>
</div>
HTML;
}



function makeCartList($r,$o) {
   $totalfixed = number_format($o->total,2,'.','');
   $selectamount = selectAmount($o->amount,10);

return $r.<<<HTML

<div class="display-flex">
   <div class="flex-none image-thumbs">
      <img src="images/store/$o->image_thumb">
   </div>
   <div class=flex-stretch>
      <strong>$o->title</strong>

      <form action="product_actions.php?action=delete-cart-item" method="post">
         <input type="hidden" name="product-id" value="$o->id">
         <input type="submit" value="Delete" class="form-button inline" style="font-size:1em;">
      </form>
   </div>

   <div class="flex-none">
      <div>&dollar;$totalfixed</div>
      <form action="product_actions.php?action=update-cart-item" method="post" onchange="this.submit()">
         <input type="hidden" name="product-id" value="$o->id">
         <div class="form-select" style="font-size:1em;">
            $selectamount
         </div>
      </form>
   </div>
</div>

HTML;
} 


function cartTotals() {
   $cart = getCartItems();

   $cartprice = array_reduce($cart,function($r,$o){return $r+$o->total;},0);

   $pricefixed = number_format($cartprice,2,'.','');
   $tax = number_format($cartprice*0.0725,2,'.','');
   $taxed = number_format($cartprice*1.0725,2,'.','');

return <<<HTML
<div class="card-section display-flex">
   <div class="flex-stretch"><strong>Sub Total</strong></div>
   <div class="flex-none">&dollar;$pricefixed</div>
</div>
<div class="card-section display-flex">
   <div class="flex-stretch"><strong>Taxes</strong></div>
   <div class="flex-none">&dollar;$tax</div>
</div>
<div class="card-section display-flex">
   <div class="flex-stretch"><strong>Total</strong></div>
   <div class="flex-none">&dollar;$taxed</div>
</div>
<div class="card-section">
   <a href="product_checkout.php" class="form-button">Checkout</a>
</div>
HTML;
}

function selectAmount($amount=1, $total=10) {
   $output = "<select name='product-amount'>";
   for($i=1;$i<=$total;$i++) {
      $output .= "<option ".($i==$amount?'selected':'').">$i</option>";
   }
   $output .= "</select>";
   return $output;
}

function makeAdminList($r,$o){
   return $r.<<<HTML
<div class="display-flex card flat soft">
   <div class="flex-none image-thumbs">
      <img src="images/store/$o->image_thumb">
   </div>
   <div class="flex-stretch" style="padding:1em;">
      <div><strong>$o->title</strong></div>
      <div>$o->category</div>
   </div>
   <div class="flex-none">
      <div class="card-section"><a href="admin/?id=$o->id" class="form-button">Edit</a></div>
      <div class="card-section"><a href="product_item.php?id=$o->id" class="form-button">View</a></div>
   </div>
</div>
HTML;
}

function makeRecommend($a) {
$products = array_reduce($a,'makeProductList');
echo <<<HTML
<div class="grid gap">$products</div>
HTML;
}


function recommendSimilar($cat,$id=0,$limit=3) {
      $result = MYSQLIQuery("
            SELECT *
            FROM products
            WHERE
               `category` = '$cat' AND
               `id` <>$id
            ORDER BY rand()
            LIMIT $limit
         ");
      makeRecommend($result);
}



function recommendCategory($cat,$limit=3) {
      $result = MYSQLIQuery("
         SELECT *
         FROM products
         WHERE
            `category` = '$cat'
         ORDER BY `date_create` DESC
         LIMIT $limit
         ");
      makeRecommend($result);
}