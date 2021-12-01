<?php include_once("classes/Database.php"); 
if(isset($_SESSION['user_id'])){
  header('Location:dashboard.php');
}
?>
<!DOCTYPE HTML>
<html lang="en-US">

<!-- Mirrored from beoro-admin.tzdthemes.com/login.php by HTTrack Website Copier/3.x [XR&CO'2005], Wed, 27 Sep 2017 08:41:39 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <link rel="icon" type="image/ico" href="favicon.png">
    <title>VE commercial Admin - Login</title>
    <link href='bootstrap/css/bootstrap.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/login.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet'>
    <!-- jQuery framework -->
        <script src="js/jquery.min.js"></script>
    <!-- validation -->
        <script src="js/lib/jquery-validation/jquery.validate.js"></script>
    <script type="text/javascript">
        (function(a){a.fn.vAlign=function(){return this.each(function(){var b=a(this).height(),c=a(this).outerHeight(),b=(b+(c-b))/2;a(this).css("margin-top","-"+b+"px");a(this).css("top","40%");a(this).css("position","absolute")})}})(jQuery);(function(a){a.fn.hAlign=function(){return this.each(function(){var b=a(this).width(),c=a(this).outerWidth(),b=(b+(c-b))/2;a(this).css("margin-left","-"+b+"px");a(this).css("left","50%");a(this).css("position","absolute")})}})(jQuery);
        $(document).ready(function() {
            if($('#login-wrapper').length) {
                $("#login-wrapper").vAlign().hAlign()
            };
            if($('#login-validate').length) {
                $('#login-validate').validate({
                    onkeyup: false,
                    errorClass: 'error',
                    rules: {
                        email: { required: true, email : true},
                        password: { required: true }
                    }
                })
            }
            if($('#forgot-validate').length) {
                $('#forgot-validate').validate({
                    onkeyup: false,
                    errorClass: 'error',
                    rules: {
                        forgotemail: { required: true, email: true }
                    },
                    submitHandler: function(form) {
                      forgotPassword();
                    }
                })
            }
            $('#pass_login').click(function() {
                $('.panel:visible').slideUp('200',function() {
                    $('.panel').not($(this)).slideDown('200');
                });
                $(this).children('span').toggle();
            });
            var url_string = window.location;
            var url = new URL(url_string);
            var c = url.searchParams.get("id");
            
        });
        function forgotPassword(){
            $.ajax({
                type : "POST",
                url : 'forgot_password_sub.php',
                data : {
                  email : $('#forgotemail').val()
                },
                dataType : "JSON",
                success : function(response){
                    if(response.status == 1){
                        $('#success').css('display','block');
                        $('#alert').css('display','none');
                    }
                    else{
                        $('#alert').css('display','block');
                        $('#success').css('display','none');
                    }
                    }
                });
        }

    </script>
</head>
<body>
   
    <div id="login-wrapper" class="clearfix">
        <div class="main-col">
            <!-- <img src="img/beoro.png" alt="" class="logo_img" /> -->

            <div class="panel">
                <!-- <p class="heading_main">Account Login</p> -->
                <img src="img/eicher-logo.png" alt="" class="" />
                <?php 
        if(isset($_SESSION['msg_session']) && $_SESSION['msg_session'] != ''){
        echo '<div class="alert alert-error"><a data-dismiss="alert" class="close">§¤¡ª</a><strong>Error! </strong>'.$_SESSION['msg_session'].'</div>';
        $_SESSION['msg_session'] = '';
        }
        if(isset($_SESSION['msg_success']) && $_SESSION['msg_success'] != ''){
        echo '<div class="alert alert-success"><a data-dismiss="alert" class="close">§¤¡ª</a><strong>Success! </strong> '.$_SESSION['msg_success'].'</div>';
        $_SESSION['msg_success'] = '';
        }
        ?>
                <form id="login-validate" action="login_sub.php" method="post">
                    <label for="email">Email Address</label>
                    <input type="text" id="email" name="email" value="" />
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" value="" />
                    <!-- <label for="login_remember" class="checkbox"><input type="checkbox" id="login_remember" name="login_remember" /> Remember me</label> -->
                    <div class="submit_sect">
                        <button type="submit" class="btn btn-beoro-3">Login</button>
                    </div>
                </form>
            </div>
            <div class="panel" style="display:none">
                <img src="img/eicher-logo.png" alt="" class="" />
                <div class="alert alert-error" id="alert" style="display: none;"><a data-dismiss="alert" class="close">§¤¡ª</a><strong>Error! </strong>Invalid Email Address</div>
                <div class="alert alert-success" id="success" style="display: none;"><a data-dismiss="alert" class="close">§¤¡ª</a><strong>Success! </strong>Your password has been successfully sent on your email</div>
                <form id="forgot-validate" method="post" action="">
                    <label for="forgotemail">Your email adress</label>
                    <input type="text" id="forgotemail"  name="forgotemail"  />
                    <div class="submit_sect">
                        <button type="submit" class="btn btn-beoro-3">Request New Password</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="login_links">
            <a href="javascript:void(0)" id="pass_login" style="float:left;"><span>Forgot password?</span><span style="display:none">Account login</span></a>
            <span style="float:right;">Design & Developed By<a href="http://ewayitsolutions.com" target="_blank"> Eway IT Solutions</a></span>
        </div>
    </div>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','../www.google-analytics.com/analytics.js','ga');
	
	  ga('create', 'UA-65387713-1', 'auto');
	  ga('send', 'pageview');
	
	</script>
</body>

<!-- Mirrored from beoro-admin.tzdthemes.com/login.php by HTTrack Website Copier/3.x [XR&CO'2005], Wed, 27 Sep 2017 08:41:39 GMT -->
</html>