<?php
require_once("../../../../include/config.php");

if( $_REQUEST["roleTitle"] && $_REQUEST["roleTitle"] !='' ) {
    $roleTitle = $_REQUEST['roleTitle'];
    $successRegisterMessage = "نقش مورد نظر با موفقیت ثبت گردید.";
    $failedRegisterMessage = "خطا در پایگاه داده! مجددا تلاش نمایید.";
    $notValidInputMessage = "داده ورودی نامعتبر می باشد. لطفا دقت فرمایید.";


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