<?php

include_once($_SERVER["DOCUMENT_ROOT"]."/views/Index_Segments.php");

Index_Segments::header(); 

$user_unique_id = htmlentities($_COOKIE["unique_id"]);
$stmt = $pdo->prepare("SELECT * FROM customers WHERE unique_id = ? LIMIT ?, ?");
$stmt->execute([$user_unique_id, 0, 1]);
$data = $stmt->fetch(PDO::FETCH_OBJ);

?>

<div class="main_body" style="margin:0"><!-- .main_body starts -->
    
<?php 
    if($data) {//if user is logged in... ~ $data from /php/account-manager.php
?>
        <h1>Hi <?=$data->customer_realname?>, Welcome to BiloOnline</h1>
        <h4>Your email address is: <?=$data->customer_email?></h4>
        <div style="width:120px;height:120px;border-radius:100%"><img src="/images/customer_image??" style="width:100%;height:auto"/></div>
<?php
    } else {//if user is not logged in:
?>
        <div style="text-align:center;margin-top:45px">
            <a href="/login"><img src="/static/images/signout.png" style=""/></a>
            <p><b>You are currently Logged Out</b></p>
            <p>Already have an account? <b><a href="/login">Login</a></b>. Don't have an account? <b><a href="/sign-up">Sign up</a></b>.</p>
        </div>
<?php
    }
?>
</div><!-- .main_body ends -->


<?php

Index_Segments::footer($site_name = SITE_NAME_SHORT, $site_url = SITE_URL, $additional_scripts = Index_Segments::index_scripts(),$whatsapp_chat = "off");

?>