<?php

include('scripts/db.php');

$level = $_GET['level'];
$username = $_GET['user'];
$otp = $_GET['otp'];

$resp = '';

if($level == 'admin'){

    $link = "index.html";

    $qry = "SELECT * FROM admin WHERE username='".$username."' AND otp='".$otp."' ";

    $res = mysqli_query($db, $qry);

    if(mysqli_num_rows($res) > 0){

        $row = mysqli_fetch_array($res);
        
        $uid = $row['id'];

        $qry2 = "UPDATE admin SET auth='t', otp='' WHERE id='".$uid."' ";

        $res2 = mysqli_query($db, $qry2);

        if($res2){
            $resp .= "Activation Successfull. Login with email and password provided";
            
        }
        else{
            $resp .= "Error";
        }
    }
    else{
        $resp .= "User Data not Found";
    }   
}
else if($level == 'user'){

    $link = "http://localhost/ocsbs";

    $qry = "SELECT * FROM user WHERE u_name='".$username."' AND otp='".$otp."' ";

    $res = mysqli_query($db, $qry);

    if(mysqli_num_rows($res) > 0){

        $row = mysqli_fetch_array($res);
        
        $uid = $row['u_id'];

        $qry2 = "UPDATE user SET auth='t', otp='' WHERE u_id='".$uid."' ";

        $res2 = mysqli_query($db, $qry2);

        if($res2){
            $resp .= "Activation Successfull. Login with email and password provided";
            
        }
        else{
            $resp .= "Error";
        }
    }
    else{
        $resp .= "User Data not Found";
    }   
}
else{}

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
            <div class="container p-3">
                <h3 class="text-success">
                <?php
                    echo $resp;
                ?>
                </h3>
            </div>
            <div class="container p-3">
                <a href="<?php echo $link; ?>" class="btn btn-primary" style="border-radius: 0;">Go to Login</a>
            </div>
        </div>
    </div>
</body>
</html>