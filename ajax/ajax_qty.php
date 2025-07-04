<?php

include_once($_SERVER["DOCUMENT_ROOT"]."/php/connection.php");

$customer_id = 1;
$product_id = "nil";
$inc_or_dec = "nil";
if(isset($_GET["id"])) {
    $product_id = htmlentities($_GET["id"]);
}

if(isset($_GET["increase_or_decrease"])) {
    $inc_or_dec = htmlentities($_GET["increase_or_decrease"]);
}

$first_sel_stmt = $pdo->prepare("SELECT * FROM orders_processor WHERE customer_id = ? AND product_id = ?");
$first_sel_stmt->execute([$customer_id, $product_id]);
$first_sel_data = $first_sel_stmt->fetch(PDO::FETCH_OBJ);
if ($first_sel_data) {//that means order is recorded, --proceed to update quantity:
    $inc = $first_sel_data->qty + 1;
    $dec = $first_sel_data->qty - 1;
    if($inc_or_dec == "increase") {
        $update_stmt = $pdo->prepare("UPDATE orders_processor SET qty = ? WHERE orders_processor_id = ?");
        $update_stmt->execute([$inc,$first_sel_data->orders_processor_id]);
        
        $main_sel_stmt = $pdo->prepare("SELECT * FROM orders_processor WHERE customer_id = ? AND product_id = ?");
        $main_sel_stmt->execute([$customer_id, $product_id]);
        $main_sel_data = $main_sel_stmt->fetch(PDO::FETCH_OBJ);
        echo $main_sel_data->qty;
    } else if($inc_or_dec == "decrease"){
        if ($first_sel_data->qty > 0) {
            $update_stmt = $pdo->prepare("UPDATE orders_processor SET qty = ? WHERE orders_processor_id = ?");
            $update_stmt->execute([$dec,$first_sel_data->orders_processor_id]);

            $main_sel_stmt = $pdo->prepare("SELECT * FROM orders_processor WHERE customer_id = ? AND product_id = ?");
            $main_sel_stmt->execute([$customer_id, $product_id]);
            $main_sel_data = $main_sel_stmt->fetch(PDO::FETCH_OBJ);
            
            if($main_sel_data->qty == 0) {
                echo "<span style='color:#888'>0</span>";
            } else {
                echo $main_sel_data->qty;
            }
        } else {
            echo "<span style='color:#888'>0</span>";
        }
    }  
} else {//if product is not yet added, but user clicks on 'increase', just return 1, it will be updated in the DB by the ajax_add_to_cart() function called via ajax after this one.
    if($inc_or_dec == "increase") {
        echo "1";
    }
}

//$select_processing_orders_stmt = $pdo->prepare("SELECT * FROM orders_processor WHERE customer_id = ? AND product_id = ?");
//$select_processing_orders_stmt->execute([$customer_id, $product_id]);
//$select_processing_orders_data = $select_processing_orders_stmt->fetch(PDO::FETCH_OBJ);

//echo $select_processing_orders_data->qty;