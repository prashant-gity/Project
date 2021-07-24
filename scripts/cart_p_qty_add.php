<?php

session_start();
$u_id = $_SESSION['u_id'];

include('db.php');

$p_id = $_POST['p_id'];

$sql = "UPDATE cart SET p_qty = p_qty + 1 WHERE u_id='".$u_id."' AND p_id='".$p_id."' ";
$sql2 = "UPDATE product set p_stock = p_stock - 1 where p_id='".$p_id."' ";

$res = mysqli_query($db, $sql);
$res2 = mysqli_query($db, $sql2);

if($res && $res2){
    echo "1";
}
else{
    echo "0";
}

?>