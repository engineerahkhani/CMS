<?php
require_once("../../../../include/config.php");

if (isset($_REQUEST))  // if form was submitted (if you came here with form data)
{
    $successMessage = 'عملیات موردنظر با موفقیت انجام شد.';
    $failedMessage = 'مجددا تلاش نمایید.';
    $userId = 4;
    //check that userId exist?
    $username = $_REQUEST['username'];
    $userEmail = $_REQUEST['userEmail'];

    if (update_userName_userEmail($userId, $username, $userEmail)){
       successRegisterMessage($successMessage);

    } else {
        failedRegisterMessage($failedMessage);
    }
}
