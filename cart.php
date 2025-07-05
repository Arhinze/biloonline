<?php

include_once($_SERVER["DOCUMENT_ROOT"]."/views/Index_Segments.php");

$customer_id = 1;
$total_amount = 0;
$cart_stmt = $pdo->prepare("SELECT * FROM orders_processor WHERE customer_id =  ? AND qty > ? LIMIT ?, ?");
$cart_stmt->execute([$customer_id, 0, 0, 25]);
$cart_data = $cart_stmt->fetchAll(PDO::FETCH_OBJ);
$cart_count = count($cart_data);

if($cart_count > 0) {
    foreach($cart_data as $cc){
        $p_stmt = $pdo->prepare("SELECT * FROM products WHERE product_id = ?");
        $p_stmt->execute([$cc->product_id]);
        $p_data = $p_stmt->fetch(PDO::FETCH_OBJ);

        $total_amount += $p_data->price*$cc->qty;
    }
}
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
                <img src="/static/images/<?=$cpd->image1?>" style="width:100%;height:auto;overflow:hidden;border-radius:9px"/>
            </div>
            <div>
                <div style="font-size:12px"><a href="/product/<?=$cpd->product_url?>" style="color:#888"><?=$short_description?></a></div>
                <div style="margin:9px 0">
                    <span class="qty">
                        <b style="font-size:24px" onclick='ajax_qty("<?=$cart_d->product_id?>","decrease","qty<?=$cart_d->orders_processor_id?>")'>-</b>&nbsp;&nbsp;
                        <span id="qty<?=$cart_d->orders_processor_id?>"><?=$cart_d->qty?></span>&nbsp;&nbsp;
                        <b style="font-size:18px" onclick='ajax_qty("<?=$cart_d->product_id?>","increase","qty<?=$cart_d->orders_processor_id?>")'>+</b>
                    </span>
                </div>
                <div style="margin-top:16px">
                    <b>NG N<?=number_format($cpd->price)?></b> &nbsp; <s>N<?=number_format($cpd->former_price)?></s>
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

    <div class="add_to_my_picks" style="display:flex"><!-- .add_to_my_picks starts -->
        <div style="margin:9px 15px 0 21%;font-weight:bold">
            NG N<span id="total_amount"><?=number_format($total_amount)?></span> &nbsp; <i class="fa fa-angle-up"></i>
        </div>
        <div class="long_action_button" style="background-color:#ff9100;box-shadow: 0 0 6px #888 inset;width:fit-content;padding:9px 18px">
            <b>Checkout</b> &nbsp; <i class="fa fa-chevron-circle-right"></i>
        </div>
    </div><!-- .add_to_my_picks ends -->
</div><!-- .main_body ends -->

<script>
    function ajax_qty(prod_id, incr_or_decr, qty_id) {
        let obj = new XMLHttpRequest;
        obj.onreadystatechange = function(){
            if(obj.readyState == 4){
                if (document.getElementById(qty_id)){
                    document.getElementById(qty_id).innerHTML = obj.responseText;
                }
            }
            //update the total amount:
            ajax_get_total_amount();
        }
 
        obj.open("GET","/ajax/ajax_qty.php?id="+prod_id+"&increase_or_decrease="+incr_or_decr);
        obj.send(null);    
    }

    function ajax_get_total_amount() {
        let obj = new XMLHttpRequest;
        obj.onreadystatechange = function(){
            if(obj.readyState == 4){
                if (document.getElementById("total_amount")){
                    document.getElementById("total_amount").innerHTML = obj.responseText;
                }
            }
        }
 
        obj.open("GET","/ajax/ajax_total_amount.php");
        obj.send(null);    
    }
</script>

<?php

Index_Segments::footer($site_name = SITE_NAME_SHORT, $site_url = SITE_URL, $additional_scripts = Index_Segments::index_scripts(),$whatsapp_chat = "off");
        echo <<<HTML
            <!-- this div is only meant to bring up the footer section of cart page so that it's not covered by the fixed 'add_to_my_picks' div-->
            <div style="margin-top:45px"></div>
HTML;

?>