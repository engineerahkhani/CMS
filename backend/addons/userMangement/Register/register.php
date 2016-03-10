<?php
require_once("../../../../include/config.php");
// if form was submitted (if you came here with form data)
if ($_REQUEST['userId']&$_REQUEST['username']&$_REQUEST['userEmail']&$_REQUEST['userPassword']&$_REQUEST['userPassword']) {
    $userId = preg_match("#(=|'|\")#", test_input($_REQUEST["userId"]));

    $flag1 = preg_match("#(=|'|\")#", test_input($_REQUEST["username"]));
    $flag2 = preg_match("#(=|'|\")#", test_input($_REQUEST["userEmail"]));
    $flag3 = preg_match("#(=|'|\")#", test_input($_REQUEST["userPassword"]));
    $flag4 = preg_match("#(=|'|\")#", test_input($_REQUEST["roleTitle"]));

    if (!$userId && !$flag1 && !$flag2 && !$flag3 && !$flag4) {
        //you can use userId for check that current user is Admin that want register new user.
        if (isAdmin($userId)) {

            $username = $_REQUEST['username'];
            $userEmail = $_REQUEST['userEmail'];
            $userPassword = $_REQUEST['userPassword'];
            $userRole = $_REQUEST['roleTitle'];

            //check that data is unique
            if (isUniqueUsername($username, 'tblUsers')) {
                if (isUniqueUserEmail($userEmail, 'tblUsers')) {
                    if(registerNewUser($username, $userEmail, $userPassword, $userRole)){
                    //user detail saved successfully;
                    successRegisterMessage($successRegisterMessage);
                    }else
                        failedRegisterMessage($failedRegisterMessage);
                } else {
                    failedRegisterMessage($notUniqueInputMessage);
                }
            } else {
                failedRegisterMessage($notUniqueInputMessage);
            }
        } else
            failedRegisterMessage($notValidUserMessage);
    }else
        failedRegisterMessage($notValidInputMessage);
}else
    failedRegisterMessage($failedMessage);

/**
 * this is so cool to work with Load. :)
 */

//TODO: check this file validation with Mr Musavi;
