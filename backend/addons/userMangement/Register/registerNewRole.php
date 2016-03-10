<?php
require_once("../../../../include/config.php");

if($_REQUEST["roleTitle"] && $_REQUEST["roleTitle"] !='' ) {
    $flag = preg_match("#(=|'|\")#", test_input($_REQUEST["roleTitle"]));
    if (!$flag) {
        $roleTitle = $_REQUEST['roleTitle'];
            //check that data is unique
            if (isUniqueRoleTitle($roleTitle, 'tblroles')) {
                registerNewRole($roleTitle);
                //role title saved successfully;
                successRegisterMessage($successRegisterMessage);
            } else {
                failedRegisterMessage($notUniqueInputMessage);
            }
    }else
        failedRegisterMessage($notValidInputMessage);
}else
    failedRegisterMessage($notValidInputMessage);

/**
 * this is so cool to work with Load. :)
 */