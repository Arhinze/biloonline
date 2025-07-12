<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/views/Index_Segments.php");

Index_Segments::header();

$remember_username = "";

//if($data){ //data from php/account-manager.php ~ if true, that means user is already logged in.
//    header("location:/dashboard");
//}

?>

<!--HTML:-->
<div class="main_body"><!-- .main_body starts -->
    <h1 style="font-size:30px;text-align:center">Bilo<span style="color:#ff9100">Online</span></h1>
    <div style="color:green;font-size:15px;text-align:center;margin-top:-19px"><i class="fa fa-key"></i>&nbsp; All data is encrypted</div>

    <div class="input" style="border-radius:36px;text-align:center;background-color:blue;border:1px solid blue;font-weight:bold;color:#fff;margin-top:30px">
        <a href="/auth/google-login.php" style="color:#fff"><i class="fa fa-google" id="signinButton"></i>&nbsp; Continue with Google -- </a>
    </div>
    <!--<div class="input" style="border-radius:36px;text-align:center;margin-top:9px;font-weight:bold">
        <a href="/auth/facebook-login.php"><i class="fa fa-facebook" style="color:blue"></i>&nbsp; Continue with Facebook -- </a>
    </div>-->
    <div class="input" style="border-radius:36px;text-align:center;margin-top:9px;font-weight:bold"><i class="fa fa-envelope"></i>&nbsp; Continue with Email</div>    
</div><!-- .main_body ends -->
    
<?php Index_Segments::footer(); ?>