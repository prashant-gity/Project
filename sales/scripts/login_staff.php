<?php

include('db.php');

$output = '';





$output .= '<div class="login-container text-center text-secondary">
            <div class="login-box p-3">
                <h3>Login to continue</h3><hr>
                <form id="staff_login_form">
                    <div class="input-group my-3">
                        <input required type="text" name="s_name" class="form-control form-control-lg" placeholder="Staff name">
                    </div>
                    <div class="input-group my-3">
                        <input required type="password" name="s_otp" class="form-control form-control-lg" placeholder="OTP">
                    </div>
                    <div class="input-group my-3">
                        <input type="submit" name="submit" class="btn btn-primary" value="Login">
                    </div>
                </form>
            </div>
            </div>';

echo $output;

?>