<?php
require_once("../../../../include/config.php");
$response = array("error" => 'FALSE');

if( $_REQUEST["roleTitle"] && $_REQUEST["roleTitle"] !='' ) {
    $roleTitle = $_REQUEST['roleTitle'];

    if(test_input($roleTitle)){
        //check that data is unique
        if(true)
        {
            if(registerNewRole($roleTitle)){
              //role title saved successfully;
                echo $roleTitle.'با موفقیت ثبت گردید.';
            }
        }else {
            $response["error"] = TRUE;
            $response["error_msg"] = "Error in db execution";
            echo "error in db execution";
        }
    }else{
        $response["error"] = TRUE;
        $response["error_msg"] = "Not valid input";
        echo "not vlid input";
    }
}else
    $response["error"] = TRUE;
    $response["error_msg"] = "Not valid input";
echo "not vlid input";



//<!--/this is cool to work woith post :)/-->