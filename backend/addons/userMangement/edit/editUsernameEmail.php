<?php
require_once("../../../../include/config.php");

if (isset($_POST))  // if form was submitted (if you came here with form data)
{
    $userId = 4;
    //check that userId exist?
    $username = $_POST['username'];
    $userEmail = $_POST['userEmail'];

    if (update_userName_userEmail($userId, $username, $userEmail)){
        return true;

    } else {
        return false;
    }
}
