<?php

session_start();

$u_id = $_SESSION['u_id'];

include('db.php');

$sql = "SELECT u_name from user where u_id='".$u_id."' ";

$res = mysqli_query($db, $sql);

$row = mysqli_fetch_array($res);

$output = $row['u_name'];
 

echo $output;


?>