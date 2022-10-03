<?php
if (!isset($_SESSION)) {
  session_start();
}
include('inc/connection.php');
?>
<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
    <title>Login | Olympia Adventure Camp</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/vendor/linearicons/style.css">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
    <link rel="stylesheet" href="assets/css/demo.css">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <!-- ICONS -->
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

    <style>
    .error {
        color: #e74a3b !important;
        font-size: 1rem;
        position: relative;
        line-height: 1;
        /*     width: 12.5rem; */
        text-align: left;
    }
    </style>
    <!-- <script src="assets/vendor/jquery_validate/jquery.validate.min.js"></script>
    <script src="assets/vendor/jquery_validate/additional-methods.min.js"></script> -->
</head>

<body>
    <!-- WRAPPER -->
    <div id="wrapper">
        <div class="vertical-align-wrap">
            <div class="vertical-align-middle">
                <div class="auth-box ">
                    <div class="left">
                        <div class="content">
                            <div class="header">
                                <p class="lead">Login to your account</p>
                            </div>
                            <form class="form-auth-small" id="loginForm" method="POST" name="loginForm">
                                <div class="form-group">
                                    <label for="signin-email" class="control-label sr-only">Username</label>
                                    <input type="text" class="form-control" id="username" name="username"
                                        placeholder="Username" require>
                                </div>
                                <div class="form-group">
                                    <label for="signin-password" class="control-label sr-only">Password</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="Password" require>
                                </div>
                                <div class="form-group clearfix">
                                    <label class="fancy-checkbox element-left">
                                        <input type="checkbox">
                                        <span>Remember me</span>
                                    </label>
                                </div>
                                <div class="alert alert-danger mt-4"
                                    style="color: white;background-color: #c12020;text-align: center;border-radius: 20px;display: none;"
                                    id="ualert">
                                    Username / password is incorrect or Inactive User.
                                </div>
                                <button type="submit" name="login" id="login"
                                    class="btn btn-primary btn-lg btn-block">LOGIN</button>
                                <div class="bottom">
                                    <span class="helper-text"><i class="fa fa-lock"></i> <a href="#">Forgot
                                            password?</a></span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="right">
                        <div class="overlay"></div>
                        <div class="content text">
                            <h1 class="heading">Welcome to Olympia Admin Portal</h1>
                            <p>by Olympia </p>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- END WRAPPER -->
    <script>
    $(document).ready(function() {


        $("#username").keyup(function() {
            $("#ualert").hide();
        });
        $("#password").keyup(function() {
            $("#ualert").hide();
        });



        $("#loginForm").validate({
            rules: {
                signin_email: {
                    required: true
                },
                password: {
                    required: true
                }
            },
            messages: {

                signin_password: {
                    required: "Username is Required"
                },
                password: {
                    required: "Password is Required"
                }

            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            },
            submitHandler: submitForm
        });


    });




    function submitForm() {
        var data = $("#loginForm").serialize();
        $("#login").html('Signing');
        $.ajax({
            type: 'POST',
            url: 'loginScript.php',
            data: data,

            success: function(response) {

                if ($.trim(response) === "ERROR") {
                    // alert("Username or password is incorrect."); 
                    $("#ualert").show();
                    $("#loginForm").trigger("reset");
                    //                   $("#loginForm").trigger(); 

                    $("#login").html('Sign In');

                } else if ($.trim(response) === "SUCCESS") {
                    $("#login").html('Sign In');
                    window.location.href = "index.php";
                }

            }
        });
        return false;
    }
    </script>
</body>

</html>