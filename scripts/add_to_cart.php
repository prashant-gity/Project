<?php

include('db.php');

session_start();

$u_id = $_SESSION['u_id'];

$p_id = $_POST['p_id'];

$output = '';

$sql = "SELECT * FROM cart WHERE p_id='".$p_id."' AND u_id='".$u_id."' ";

$res = mysqli_query($db, $sql);

if(mysqli_num_rows($res) > 0){
    $output = '2';
}
else{
    $sql = "INSERT into cart(p_id, u_id, p_qty) values('".$p_id."', '".$u_id."', '1')";
    $sql2 = "UPDATE product set p_stock = p_stock - 1 where p_id='".$p_id."' ";
    $res = mysqli_query($db, $sql);
    $res2 = mysqli_query($db, $sql2);
    if($res && $res2){
        $output = '1';
    }
    else{
        $output = '3';
    }
}

echo $output;

?>