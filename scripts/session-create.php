<?php

function session_create($u_id){
    session_start();
    $_SESSION['u_id'] = $u_id;
}



?>