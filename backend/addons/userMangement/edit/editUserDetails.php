<?php
require_once("../../../../include/config.php");

if (isset($_REQUEST))  // if form was submitted (if you came here with form data)
{

    $userId = $_REQUEST['userId'];
    //check that userId exist?
    $username = $_REQUEST['username'];
    $userEmail = $_REQUEST['userEmail'];
    $userRegDate = $_REQUEST['userRegDate'];
    $userLastLoginDate = $_REQUEST['userLastLoginDate'];
    $userRole = $_REQUEST['roleTitle'];

    if (UpdateUserDetails($userId, $username, $userEmail,$userRegDate,$userLastLoginDate,$userRole)){
        successRegisterMessage($successMessage);

    } else {
        failedRegisterMessage($failedMessage);

    }
}
