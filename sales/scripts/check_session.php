<?php

session_start();

if($_SESSION['s_id']){
    echo 'true';
}
else{
    echo 'false';
}


?>