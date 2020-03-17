

<!DOCTYPE html>
<html lang="en">

<?php 



?>

<head>
    <title>Login V3</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="<?php echo css_url("fonts/iconic/css/material-design-iconic-font.min.css")?>">
    <link rel="stylesheet" href="<?php echo css_url("vendor/animate/animate.css")?>">
    <link rel="stylesheet" href="<?php echo css_url("vendor/css-hamburgers/hamburgers.min.css")?>">
    <link rel="stylesheet" href="<?php echo css_url("vendor/animsition/css/animsition.min.css")?>">
    <link rel="stylesheet" href="<?php echo css_url("vendor/select2/select2.min.css")?>">
    <link rel="stylesheet" href="<?php echo css_url("vendor/daterangepicker/daterangepicker.css")?>">
    <link rel="stylesheet" href="<?php echo css_url("css/util.css")?>">
    <link rel="stylesheet" href="<?php echo css_url("css/main.css")?>">




</head>

<body>

    <div class="limiter">
        <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
            <div class="wrap-login100">
                <form method="POST" class="login100-form validate-form">

                    <span class="login100-form-logo">
                        <i class="zmdi zmdi-landscape"></i>
                    </span>

                    <span class="login100-form-title p-b-34 p-t-27">

                    <?php echo lang("login")?>
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="<?php echo lang("enter_username")?>">
                        <input class="input100" type="text" name="username" placeholder="<?php echo lang("username")?>">
                        <span class="focus-input100" data-placeholder="&#xf207;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="<?php echo lang("enter_password")?>">
                        <input class="input100" type="password" name="password" placeholder="<?php echo lang("password")?>">

                        <span class="focus-input100" data-placeholder="&#xf191;"></span>
                    </div>

                    <div class="contact100-form-checkbox">
                        <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                        <label class="label-checkbox100" for="ckb1">

                            <?php echo lang("remember_me")?>

                        </label>
                    </div>

                    <div class="container-login100-form-btn">

                        <input class="login100-form-btn" name="login" type="submit" value="<?php echo lang("login")?>">
                        
                        

                    </div>

                    <!-- <div class="text-center p-t-90">
						<a class="txt1" href="#">
							Forgot Password?
						</a>
					</div> -->
                </form>
            </div>
        </div>

    </div>

    <script src="vendor/animsition/js/animsition.min.js"></script>
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
    <script src="vendor/countdowntime/countdowntime.js"></script>
    <script src="js/main.js"></script>

    <div id="dropDownSelect1"></div>


</body>

</html>

