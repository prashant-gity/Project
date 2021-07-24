<?php

include('scripts/db.php');

$username = $_GET['user'];
$otp = $_GET['otp'];

$resp = '';


    $qry = "SELECT * FROM admin WHERE username='".$username."' AND otp='".$otp."' ";

    $res = mysqli_query($db, $qry);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Authentication</title>

    <link rel="stylesheet" href="css/bootstrap.css">

    <script src="js/jquery.js"></script>
</head>
<body>
    <div class="row">
        <div class="container p-5">

            <?php
                if(mysqli_num_rows($res) > 0){
            ?>
            <div class="container p-3 text-center">
                <h3 class="text-success text-center">Password reset form.</h3>
                    <form action="password-update.php" method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control disabled" id="username" name="username" value="<?php echo $username; ?>">
                    </div>
                    <div class="form-group">
                        <label for="password">New Password:</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="form-group">
                        <label for="cpassword">Confirm Password:</label>
                        <input type="password" class="form-control" id="cpassword" name="cpassword">
                    </div>
                    <div class="form-group text-muted" id="res">

                    </div>
                    <div class="form-group">
                        <input type="submit" value="Submit" name="submit" class="btn btn-primary" style="boder-radius: 0;" id="submit">
                    </div>
                    </form>
            </div>
            <?php
                }
                else{
            ?>
            <div class="container p-3">
                <h3 class="text-danger text-center">User not found.</h3>
                <p>
                    
                </p>
            </div>
            <?php
                }
            ?>
        </div>
    </div>

    
    <script>
    $(document).ready(function(){
        $("#submit").hide();
        $("#cpassword").keyup(function(){
            var pswd = $("#password").val();
            var cpswd = $(this).val();

            if(cpswd!= pswd){
                $("#res").text("Password do not match.");
                $("#submit").hide();
            }
            else{
                $("#res").html("Password matched.");
                $("#submit").show();
            }
        });
    });
    </script>
</body>
</html>