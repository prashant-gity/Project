<?php

include('db.php');

$output = '';





$output .= '<div class="login-container text-center text-secondary">
            <div class="login-box p-3">
                <h3>Signup form</h3><hr>
                <form id="user_signup_form">
                    <div class="input-group my-3">
                        <input required type="email" name="u_name" class="form-control form-control-lg" placeholder="Email">
                    </div>
                    <div class="input-group my-3">
                        <input required type="tel" name="u_mob" class="form-control form-control-lg" placeholder="Mobile">
                    </div>
                    <div class="input-group my-3">
                        <input required type="password" name="u_pass" class="form-control form-control-lg" placeholder="Password">
                    </div>
                    <div class="input-group my-3">
                        <input type="submit" class="btn btn-primary" placeholder="Email" value="Signup">
                    </div>
                    Already registerd go to <a href="" id="signup_button" class="text-info">login.</a>
                </form>
            </div>
            </div>
            ';

echo $output;

?>