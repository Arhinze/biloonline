<?php

include_once($_SERVER["DOCUMENT_ROOT"]."/views/Index_Segments.php");

$customer_id = 1;
$cart_stmt = $pdo->prepare("SELECT * FROM orders_processor WHERE customer_id =  ? AND qty > ? LIMIT ?, ?");
$cart_stmt->execute([$customer_id, 0, 0, 25]);
$cart_data = $cart_stmt->fetchAll(PDO::FETCH_OBJ);
$cart_count = count($cart_data);
Index_Segments::header(); 
?>
<div class="main_body" style="margin:0"><!-- .main_body starts -->

<?php
echo "<div style='margin:12px;font-weight:bold'>Cart ($cart_count)</div>";
if (count($cart_data) > 0) {//that means user has an item or more in cart -- list them out:
    foreach($cart_data as $cart_d) {
        $prod_stmt = $pdo->prepare("SELECT * FROM products WHERE product_id = ?");
        $prod_stmt->execute([$cart_d->product_id]);
        $cart_prod_data = $prod_stmt->fetchAll(PDO::FETCH_OBJ);

        foreach($cart_prod_data as $cpd) {
            $short_description = substr($cpd->description,0,36)."... ";
?>
        <div style="display:flex;margin:12px">
            <div class="cart_image_div" style="width:120px;height:120px;margin-right:15px;overflow:hidden">
                <img src="/static/images/<?=$cpd->image1?>" style="width:100%;height:auto"/>
            </div>
            <div>
                <div style="font-size:12px;color:#888"><?=$short_description?></div>
                <div>
                    <span class="qty">
                        <b style="font-size:24px" onclick='ajax_qty("$product_id","decrease")'>-</b>&nbsp;&nbsp;
                        <span id="qty"><?=$cart_d->qty?></span>&nbsp;&nbsp;
                        <b style="font-size:18px" onclick='ajax_qty("$product_id","increase")'>+</b>
                    </span>
                </div>
                <div>
                    <b>NG N<?=$cpd->price?></b> &nbsp; <s>N<?=$cpd->former_price?></s>
                </div>
            </div>
        </div>
<?php
        }
    }
} else {//if user has no item in cart:
    echo "<div style='font-weight:bold;text-align:center;margin:24px 6px'>Sorry, No item is in your cart. Kindly add Item to cart to continue.</div>";
}
?>

</div><!-- .main_body ends -->

<?php

Index_Segments::footer(); 

?>