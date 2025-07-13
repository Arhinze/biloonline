<?php

include_once($_SERVER["DOCUMENT_ROOT"]."/views/Index_Segments.php");

Index_Segments::header(); 

?>

<div class="main_body" style="margin:0"><!-- .main_body starts -->
    
<?php 
    if($data) {//if user is logged in... ~ $data from /php/account-manager.php
?>
        <h1>Hi <?=$data->customer_realname?>, Welcome to BiloOnline</h1>
        <h4>Your email address is: <?=$data->customer_email?></h4>
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