<?php

include('db.php');

$o_id = $_POST['o_id'];


$sql = "UPDATE order_master set o_status='t', token=NULL WHERE o_id=".$o_id."  ";

$sql2 = "INSERT into sales(o_id) values(".$o_id.")";

$res = mysqli_query($db, $sql);

$res2 = mysqli_query($db, $sql2);

//echo $sql;

if($res && $res2){
    echo "1";
}
else{
    echo "2";
}







?>