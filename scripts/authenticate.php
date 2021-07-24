<?php

include('db.php');
include('session-create.php');

$u_name = $_POST['u_name'];

$u_pass = $_POST['u_pass'];

$u_pass = md5($u_pass);

$sql = "SELECT * from user where u_name='".$u_name."' AND u_pass='".$u_pass."' ";

$result = mysqli_query($db, $sql);

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);

        $auth = $row['auth'];
        $u_id = $row['u_id'];
        if($auth == 'f'){
            echo "2";
        }
        else if($auth == 't'){
            session_create($u_id);
            echo "1";
        }
        else{
            echo "3";
        }
    }
    else{
        echo "0";
    }

?>