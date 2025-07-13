<?php

include_once($_SERVER["DOCUMENT_ROOT"]."/views/Index_Segments.php");

$user_stmt = $pdo->prepare("SELECT * FROM customers WHERE unique_id =  ? LIMIT ?, ?");
$user_stmt->execute([$user_unique_id, 0, 1]);
$user_data = $user_stmt->fetch(PDO::FETCH_OBJ);

Index_Segments::header(); 
?>

<div class="main_body" style="margin:0"><!-- .main_body starts -->
    
<?php 
    if($user_data) {
?>
        <h1>Hi <?=$user_data->customer_realname?>, Welcome to BiloOnline</h1>
<?php
    } else {//if user is not logged in:
?>
        <div style="text-align:center;margin-top:45px">
            <a href="/login"><img src="/static/images/signout.png" style=""/></a>
            <p><b>You are currently Logged Out</b></p>
            <p>Already have an account? <b><a href="/login">Login</a></b>. Don't have an account? <b><a href="/sign-up">Sign up</a></b>.</p>
        </div>

        <h1><?=$_COOKIE["new_user_email"]?></h1>
        <h1><?=$_SESSION["google_email"]?></h1>
<?php
    }
?>
</div><!-- .main_body ends -->


<?php

Index_Segments::footer($site_name = SITE_NAME_SHORT, $site_url = SITE_URL, $additional_scripts = Index_Segments::index_scripts(),$whatsapp_chat = "off");

?>