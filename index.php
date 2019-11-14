
<?php
session_start();
if (isset($_SESSION['id'] )){
    header("location:dashboard.php");
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login V19</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--===============================================================================================-->	
        <link rel="icon" type="image/png" href="_login/images/icons/favicon.ico"/>
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="_login/vendor/bootstrap/css/bootstrap.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="_login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="_login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="_login/vendor/animate/animate.css">
        <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="_login/vendor/css-hamburgers/hamburgers.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="_login/vendor/animsition/css/animsition.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="_login/vendor/select2/select2.min.css">
        <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="_login/vendor/daterangepicker/daterangepicker.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="_login/css/util.css">
        <link rel="stylesheet" type="text/css" href="_login/css/main.css">
        <!--===============================================================================================-->
    </head>
    <body>

        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
                    <form class="login100-form validate-form " action="validateUser.php" method="post">
                        <span class="login100-form-title p-b-33">
                            Account Login
                        </span>

                        <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                            <input class="input100" type="text" name="userid" placeholder="Email" autocomplete="off">
                            <span class="focus-input100-1"></span>
                            <span class="focus-input100-2"></span>
                        </div>

                        <div class="wrap-input100 rs1 validate-input" data-validate="Password is required">
                            <input class="input100" type="password" name="password" placeholder="Password">
                            <span class="focus-input100-1"></span>
                            <span class="focus-input100-2"></span>
                        </div>

                        <div class="container-login100-form-btn m-t-20">
                            <button class="login100-form-btn" name="btn" value="login">
                                Sign in
                            </button>
                        </div>

                        <div class="text-center p-t-45 p-b-4">
                            <span class="txt1">
                                Forgot
                            </span>

                            <a href="#" class="txt2 hov1">
                                Username / Password?
                            </a>
                        </div>

                        <div class="text-center">
                            <span class="txt1">
                                Create an account?
                            </span>

                            <a href="signUp.php" class="txt2 hov1">
                                Sign up
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>



        <!--===============================================================================================-->
        <script src="_login/vendor/jquery/jquery-3.2.1.min.js"></script>
        <!--===============================================================================================-->
        <script src="_login/vendor/animsition/js/animsition.min.js"></script>
        <!--===============================================================================================-->
        <script src="_login/vendor/bootstrap/js/popper.js"></script>
        <script src="_login/vendor/bootstrap/js/bootstrap.min.js"></script>
        <!--===============================================================================================-->
        <script src="_login/vendor/select2/select2.min.js"></script>
        <!--===============================================================================================-->
        <script src="_login/vendor/daterangepicker/moment.min.js"></script>
        <script src="_login/vendor/daterangepicker/daterangepicker.js"></script>
        <!--===============================================================================================-->
        <script src="_login/vendor/countdowntime/countdowntime.js"></script>
        <!--===============================================================================================-->
        <script src="_login/js/main.js"></script>

    </body>
</html>