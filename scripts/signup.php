<?php
// ------------------------Loading all Modules-----------------------------
//------------1.   Database Connection-------------------------------------
// -----------2.   Mailing Module------------------------------------------
// -----------3.   OTP generation Module-----------------------------------

include('db.php');
include('send-mail.php');
include('random-number.php');

//------------------------Loading Complete--------------------------------

//---------------Check for an empty form submit--------------------------
//---------------Valid Post if block-------------------------------------
if(!empty($_POST)){


    //------------Validating all POST Values--------------------------------//
    $u_name = mysqli_real_escape_string($db, $_POST['u_name']);
    $u_mob = mysqli_real_escape_string($db, $_POST['u_mob']);
    $u_pass = mysqli_real_escape_string($db, $_POST['u_pass']);

    //---------------------Encrypting password-----------------------------//
    $u_pass = md5($u_pass);

    


    //--------------------Otp Generation----------------------------------//
    //--------------random_number() function to generate otp--------------//
    //-------parameter in function is how long otp should be generated----//
    $otp = random_number(4);

    $otp = md5($otp);

    //---Insertion in admin table before authentication with otp value------//
    $sql = "INSERT into user(`u_name`, `u_mob`, `u_pass`, `otp`) values('".$u_name."', '".$u_mob."', '".$u_pass."', '".$otp."')";
    $result = mysqli_query($db, $sql);

    $sub = "Activation link to activate account";
    

    //--------Email body message containing userID and OTP with link to activate-----------------//
    $body = "Your User Registration is one step ahead. Please Click the following link to activate your account.";
    $body .="link : http://localhost/ocsbs/admin/user_auth.php?level=user&user=".$u_name."&otp=".$otp."";

    //-------Sending email through php mailer---------------//
    //----------------Function send_mail in send-mail.php module-----------------//
    $mail_res = send_mail($u_name, $sub, $body);

    //--------if all goes correct insertion and mail-------------------------///

    if($result && $mail_res){
        echo "Activation link sent to Email Provided.";
    }

    //--------------else if something is wrong-------------------//
    else{
        echo "Invalid Credentials.";
    }
    
    


    

}

//--------------Valid Post Block Ends------------------------------------


//--------------Empty Post block else Case-------------------------------

else{
    echo "Fill out all fields.";
}
//--------------Empty Post block else Case ends---------------------------


?>


