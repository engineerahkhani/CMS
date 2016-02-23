<?php
require_once("../../../../include/config.php");

if($_REQUEST["userId"] && $_REQUEST["userId"] !='' ) {
    $flag = preg_match("#(=|'|\")#", test_input($_REQUEST["userId"]));
    if (!$flag) {
        $userId = $_REQUEST['userId'];
        //check that data is unique
        if (isExist($userId, 'tblusers')) {
            deleteUser($userId);
            //role title saved successfully;
            successRegisterMessage($successRegisterMessage);
        } else {
            failedRegisterMessage($notExistDataMessage);
        }
    }else
        failedRegisterMessage($notValidInputMessage);
}else
    failedRegisterMessage($notValidInputMessage);

/**
 * this is so cool to work with Load. :)
 */