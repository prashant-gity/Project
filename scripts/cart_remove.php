<?php

session_start();
$u_id = $_SESSION['u_id'];

include('db.php');

$p_id = $_POST['p_id'];

$sql3 = "SELECT p_qty from cart WHERE u_id=".$u_id." AND p_id=".$p_id." ";

$res3 = mysqli_query($db, $sql3);
$row3 = mysqli_fetch_array($res3);
$p_qty = $row3['p_qty'];

$sql = "DELETE FROM cart where u_id=".$u_id." AND p_id=".$p_id." ";

$sql2 = "UPDATE product set p_stock = p_stock + ".$p_qty." where p_id='".$p_id."' ";



$res = mysqli_query($db, $sql);

$res2 = mysqli_query($db, $sql2);

if($res && $res2){
    echo "1";
}
else{
    echo "0";
}

?>