<?php

include_once($_SERVER["DOCUMENT_ROOT"]."/php/connection.php");

$customer_id = 1;
$product_id = "nil";
if(isset($_GET["id"])) {
    $product_id = htmlentities($_GET["id"]);
}

$first_sel_stmt = $pdo->prepare("SELECT * FROM orders_processor WHERE customer_id = ? AND product_id = ?");
$first_sel_stmt->execute([$customer_id, $product_id]);
$first_sel_data = $first_sel_stmt->fetch(PDO::FETCH_OBJ);
if ($first_sel_data) {//that means order is recorded, --proceed to update quantity:
    $inc = $first_sel_data->qty + 1;
    $update_stmt = $pdo->prepare("UPDATE orders_processor SET qty = ? WHERE orders_processor_id = ?");
    $update_stmt->execute([$inc,$first_sel_data->orders_processor_id]);
    
    echo $first_sel_data->qty;
}

//$select_processing_orders_stmt = $pdo->prepare("SELECT * FROM orders_processor WHERE customer_id = ? AND product_id = ?");
//$select_processing_orders_stmt->execute([$customer_id, $product_id]);
//$select_processing_orders_data = $select_processing_orders_stmt->fetch(PDO::FETCH_OBJ);

//echo $select_processing_orders_data->qty;