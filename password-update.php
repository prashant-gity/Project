<?php

include('scripts/db.php');

if(isset($_POST['submit'])){
    $pswd = $_POST['password'];
    $username = $_POST['username'];
    echo $username;
    $pswd = md5($pswd);
    $sql = "UPDATE admin SET `password`='".$pswd."', `otp`='' WHERE username='".$username."'";

    $res = mysqli_query($db, $sql);

    if($res){
       // header('location: index.html');
       echo "success";
    }
    else{
        echo "Unable to Update Password.";
    }
}
else{
    echo "Error ";
}

?>