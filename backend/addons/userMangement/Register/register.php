<?php
require_once("../../../../include/config.php");

if ($_REQUEST)  // if form was submitted (if you came here with form data)
{
    $username = $_REQUEST['userId'];
    $username = $_REQUEST['username'];
    $userEmail = $_REQUEST['userEmail'];
    $userPassword = $_REQUEST['userPassword'];
    $userRole = $_REQUEST['roleTitle'];

    if(register_user($username,$userEmail,$userPassword,$userRole)){
        echo successRegisterMessage($successMessage);
    }else{
        echo failedRegisterMessage($failedRegisterMessage);
    }

}
?>