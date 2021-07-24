<?php

session_start();

if($_SESSION['u_id']){
    echo 'true';
}
else{
    echo 'false';
}


?>