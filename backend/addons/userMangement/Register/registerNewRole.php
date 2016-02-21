<?php
require_once("../../../../include/config.php");

if( $_REQUEST["roleTitle"] && $_REQUEST["roleTitle"] !='' ) {
    $roleTitle = $_REQUEST['roleTitle'];



    if(test_input($roleTitle)){
        //check that data is unique
        if(true)
        {
            if(registerNewRole($roleTitle)){
              //role title saved successfully;
                successRegisterMessage($successRegisterMessage);
            }
        }else {
            failedRegisterMessage($failedRegisterMessage);
        }
    }else{
        failedRegisterMessage($$notValidInputMessage);


    }
}else{
    failedRegisterMessage($$notValidInputMessage);
}

//
//<!--/this is cool to work with Load :)/-->