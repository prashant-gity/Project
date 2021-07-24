<?php

function session_create($s_id){
    session_start();
    $_SESSION['s_id'] = $s_id;
}



?>