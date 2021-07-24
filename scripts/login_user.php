<?php

include('db.php');

$output = '';





$output .= '<div class="login-container text-center text-secondary">
            <div class="login-box p-3">
                <h3>Login to continue</h3><hr>
                <form id="user_login_form">
                    <div class="input-group my-3">
                        <input required type="email" name="u_name" class="form-control form-control-lg" placeholder="Email">
                    </div>
                    <div class="input-group my-3">
                        <input required type="password" name="u_pass" class="form-control form-control-lg" placeholder="Password">
                    </div>
                    <div class="input-group my-3">
                        <input type="submit" class="btn btn-primary" placeholder="Email" value="Login">
                    </div>
                    Dont have account <a id="signup_button" class="text-info">Signup here.</a>
                    <hr>
                    <!-- Forgot <a id="forget_username" class="text-danger">Username / </a>
                    <a id="forget_password" class="text-danger">Password</a> -->
                </form>
            </div>
            </div>';

echo $output;

?>