<?php

include_once($_SERVER["DOCUMENT_ROOT"]."/views/Index_Segments.php");

//if($data) { //$data variable from php/account-manager.php
// that means user is logged in:
//display header

    Index_Segments::header($site_name = SITE_NAME_SHORT, $site_url = SITE_URL, $Hi_user = "", $title="Payment Successful");
 
        // $_GET variables:
        $dep_amount = isset($_GET["total_amount"]) ? htmlentities($_GET["total_amount"]) : "";
        $my_refx = isset($_GET["refx"]) ? htmlentities($_GET["refx"]) : "";
        $uu_id = isset($_GET["unique_id"]) ? htmlentities($_GET["unique_id"]) : "";
        $ps_trx_ref = isset($_GET["trxref"]) ? htmlentities($_GET["trxref"]) : "";

        //Check if transaction is a valid transaction before recording payment:
        $tr_attempt_check_stmt = $pdo->prepare("SELECT * FROM orders_processor WHERE customer_id = ? AND my_refx_id = ? LIMIT ?, ?");
        $tr_attempt_check_stmt->execute([$uu_id, $my_refx, 0, 1]);
        $tr_attempt_data =  $tr_attempt_check_stmt->fetchAll(PDO::FETCH_OBJ);

        if ($tr_attempt_data > 0) { // ~ transaction is a valid transaction
            foreach($tr_attempt_data as $tr_ad) {
                //use these next 3 lines to get data object for product name and price:
                $product_stmt = $pdo->prepare("SELECT * FROM products WHERE product_id = ? LIMIT ?, ?");
                $product_stmt->execute([$tr_ad->product_id, 0, 1]);
                $product_data =  $product_stmt->fetch(PDO::FETCH_OBJ);

                //Insert deposit transaction . .
                //$hstkp_transactions->deposit($data->user_id, $dep_amount, "You made a deposit");
                if ($tr_ad->qty > 0) {//if ordered product quantity is more than 0(is at least 1): ~ record the order
                    $new_tr_stmt = $pdo->prepare("INSERT INTO orders(unique_id, product_id, product_name, `price`, qty, order_time, my_refx_id, ps_refx_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
                    $new_tr_stmt->execute([$uu_id, $tr_ad->product_id, $product_data->product_name, $product_data->price, $tr_ad->qty, date("Y-m-d H:i:s", time()), $ps_trx_ref, $my_refx]);  
                }
            }

            //Delete the transaction from orders_processor to avoid a repeat
            $delete_tr_att_stmt = $pdo->prepare("DELETE FROM orders_processor WHERE my_refx_id = ?");
            $delete_tr_att_stmt->execute([$my_refx]);

            //mail admin
            //$mail1 = mail($sender, "A user deposited a sum of N$dep_amount", $admin_successful_deposit_message, $headers);
            //mail user
            //$mail2 = mail($user_mail, "Inflow ~ your deposit of N$dep_amount was successful", $user_successful_deposit_message, $headers);
            //check_mail_status($mail1);
            //check_mail_status($mail2);
            
            //mail admin:
            //$mail1 = $cm->send_quick_mail($sender, "A user deposited a sum of N$dep_amount", $admin_successful_deposit_message); 
            //check_mail_status($mail1);
            //$mail->clearAddresses();
            
            //mail user:
            //$mail2 = $cm->send_quick_mail($user_mail, "Inflow ~ your deposit of N$dep_amount was successful", $user_successful_deposit_message); 
            //check_mail_status($mail2);
            //$mail->clearAddresses();

            //display success message:
?>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 50px;
        }
        .message {;
            text-align: center;
            background-color: #dff0d8;
            color: #3c763d;
            padding: 20px;
            border-radius: 5px;
            margin: 20px 12px;
            max-width: 600px;
        }
    </style>
    
    <div style="margin:45px 12px 75px 12px">
        <div class="message">
            <h1>Deposit Successful</h1>
            <p>Thank you for banking with us! Your transaction was successful.</p>
            <p>You will receive an email confirmation shortly.</p>
            <p style="font-weight:bold"><a href="/my-account">Return to Dashboard</a></p>
        </div>
    </div>

<?php
    } else {//either transaction has already been made or user is just visiting this page:
?>
    <div class='invalid' style='background-color:green;color:#fff'>Please proceed to the <a href='/my-account'>dashboard</a></div>
    <div style="margin:45px 12px 75px 12px" style="text-align:center">
        - - -
    </div>

<?php
    }
    Index_Segments::footer();
//} else { //if user is not logged in . .
//    header("location: /login");
//}
?>