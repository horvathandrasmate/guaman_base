<div class="limiter">
        <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
            <div class="wrap-login100">
                <form method="post" class="login100-form validate-form">
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