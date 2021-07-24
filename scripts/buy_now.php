<?php

session_start();
$u_id = $_SESSION['u_id'];

$total = $_POST['total'];

include('db.php');
include('random-number.php');

$token = random_number(6);

$sql = "INSERT into order_master(u_id,token,o_val) values(".$u_id.", ".$token.", ".$total.") ";
$res = mysqli_query($db, $sql);

if($res){
    $sql2 = "SELECT * FROM cart WHERE u_id='".$u_id."' ";
    $sql3 = "SELECT max(o_id) FROM order_master WHERE u_id=".$u_id." ";
    
    $res2 = mysqli_query($db, $sql2);
    $res3 = mysqli_query($db, $sql3);
    
    $row3 = mysqli_fetch_array($res3);
    
    $o_id = $row3['max(o_id)'];
    
    
    while($row2 = mysqli_fetch_array($res2)){
        $sql4 = "INSERT into order_item(o_id, p_id, p_qty) values('".$o_id."', '".$row2['p_id']."', '".$row2['p_qty']."') ";
        $res4 = mysqli_query($db, $sql4);
    }
    
    $sql5 = "DELETE from cart where u_id=".$u_id." ";
    $res5 = mysqli_query($db, $sql5);

    if($res5){
        echo "1";
    }
    else{
        echo "0";
    }
}
else{
    echo "0";
}














?>