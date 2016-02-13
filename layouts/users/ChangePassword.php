<?php
require_once("../../include/config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $userId = $_POST['userId'];
    $oldPassword = test_input($_POST['oldPassword']);
    $newPassword =  test_input($_POST['newPassword']);
    $reNewPassword = test_input($_POST['reNewPassword']);
    if($newPassword == $oldPassword)
    {
    // its ok lets go
    if(updateUserPassword($userId,$newPassword))
    {
        echo "changed";
    }else{
        echo "could not change";
    }
    }else{
        echo "password not match";
    }

}
else
    echo "error";


