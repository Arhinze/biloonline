<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/views/Index_Segments.php");

Index_Segments::header();

$remember_email = "";
$heading = "";
$repeat_password_tag = "";
$remember_email = "";

if(isset($_POST["user_code"]) && (!empty($_POST["user_code"])) && (htmlentities($_POST["user_code"]) == $_POST["xsrf_code"])){
    $user_email = htmlentities($_POST["email"]);
    $stmt = $pdo->prepare("SELECT * FROM customers WHERE customer_email = ? LIMIT ?, ?");
    $stmt->execute([$user_email, 0, 1]);
  
    $data = $stmt->fetch(PDO::FETCH_OBJ);

    $remember_email = $user_email;

    if($data){ //data from php/account-manager.php ~ if true, that means user has an account already.
        $heading = "Login";
    } else {
        $heading = "Create Account";
        $repeat_password_tag = '<div><input type="text" name="repeat_password" class="input"  placeholder="Repeat Password: ******"/></div>';
    }

?>

    <!--HTML:-->
    <div class="main_body"><!-- .main_body starts -->
        <h1 style="font-size:30px;text-align:center">Bilo<span style="color:#ff9100">Online</span></h1>
        <div style="color:green;font-size:15px;text-align:center;margin-top:-19px"><i class="fa fa-key"></i>&nbsp; All data is encrypted</div>
    
        <div style="border:1px solid #000;border-radius:15px;width:96%;margin-top:21px">
            <h2 style="text-align:center"><?=$heading?></h2>
            <div style="position:relative;height:fit-content;margin:6px 12px"><!-- .email and continue button starts -->
                <form method="POST" action="/redirect-to-my-account">
                    <div><input type="email" class="input" placeholder="Enter Email Address:abc@example.com"/></div>
                    <div style="margin-top:9px"><input type="text" class="input" placeholder="Enter Full Name:"/></div>
    
                    <h3>Password:</h3>
                    <div style="margin:6px 0"><input type="text" name="password" class="input" placeholder="Enter Password: ******"/></div>
                    <?=$repeat_password_tag?>
                    <div style="margin:9px 0 24px 0;width:100%"><button class="input" style="padding:9px 36%;border-radius:30px;color:#fff;font-weight:bold;background-color:#ff9100">Continute</button></div>
                </form>
            </div><!-- .email and continue button ends -->
        </div>
    </div><!-- .main_body ends -->

<?php
} else {//if captcha is wrong or empty:
?>
    <div class="invalid">Invalid Captcha Code</div>
    <div style="margin:60px 12px;text-align:center">
        <form method = "post" action="/login">
            <input type="hidden" value="<?=$remember_email?>"/>
            <button type="submit" class="input" style="color:#fff;background-color:#ff9100;border:1px solid #fff;font-weight:bold"><i class="fa fa-arrow-left"></i> &nbsp; return to previous page</button>
        </form>
    </div>
<?php
}
?>
    
<?php Index_Segments::footer(); ?>