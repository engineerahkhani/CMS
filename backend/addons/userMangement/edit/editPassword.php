<?php
require_once("../../../../include/config.php");

if ($_REQUEST){

    $userId = $_REQUEST['userId'];
    $oldPassword = test_input($_REQUEST['oldPassword']);
    $newPassword =  test_input($_REQUEST['newPassword']);
    $reNewPassword = test_input($_REQUEST['reNewPassword']);
    if($newPassword == $reNewPassword)
    {
    // its ok lets go
    if(updateUserPassword($userId,$newPassword))
    {
        successRegisterMessage($successMessage);
    }else{
        failedRegisterMessage($notValidInputMessage);
    }
    }else{
    failedRegisterMessage($notMatchPasswords);
    }

}
else
    echo "error";


