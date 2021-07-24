<?php

include('db.php');
include('session-create.php');

$s_name = $_POST['s_name'];

$s_otp = $_POST['s_otp'];

$sql = "SELECT * from staff where s_name='".$s_name."' AND s_otp='".$s_otp."' ";

$result = mysqli_query($db, $sql);

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);
        $s_id = $row['s_id'];
            session_create($s_id);
            echo "1";
    }
    else{
        echo "0";
    }

?>