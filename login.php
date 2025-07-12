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
        <a href="/auth/google-login.php"><i class="fa fa-google" id="signinButton"></i>&nbsp; Continue with Google -- </a>
    </div>
    <div class="input" style="border-radius:36px;text-align:center;margin-top:9px;font-weight:bold">
        <a href="/auth/facebook-login.php"><i class="fa fa-facebook" style="color:blue"></i>&nbsp; Continue with Facebook</div></a>
    <div class="input" style="border-radius:36px;text-align:center;margin-top:9px;font-weight:bold"><i class="fa fa-envelope"></i>&nbsp; Continue with Email</div>
        
</div><!-- .main_body ends -->

<!-- BEGIN Pre-requisites -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script src="https://apis.google.com/js/client:platform.js?onload=start" async defer></script>
<!-- END Pre-requisites -->

<script>
    function start() {
      gapi.load('auth2', function() {
        auth2 = gapi.auth2.init({
          client_id: 'YOUR_CLIENT_ID.apps.googleusercontent.com',
          // Scopes to request in addition to 'profile' and 'email'
          //scope: 'additional_scope'
        });
      });
    }
</script>

<script>
    $('#signinButton').click(function() {
      // signInCallback defined in step 6.
      auth2.grantOfflineAccess().then(signInCallback);
    });
</script>

<!-- Last part of BODY element in file index.html -->
<script>
function signInCallback(authResult) {
    if (authResult['code']) {

        // Hide the sign-in button now that the user is authorized, for example:
        $('#signinButton').attr('style', 'display: none');
    
        // Send the code to the server
        $.ajax({
          type: 'POST',
          url: '/auth/storeauthcode.php',
          // Always include an `X-Requested-With` header in every AJAX request,
          // to protect against CSRF attacks.
          headers: {
            'X-Requested-With': 'XMLHttpRequest'
          },
          contentType: 'application/octet-stream; charset=utf-8',
          success: function(result) {
            // Handle or verify the server response.
          },
          processData: false,
          data: authResult['code']
        });
    } else {
        // There was an error.
    }
}
</script>
    
<?php Index_Segments::footer(); ?>