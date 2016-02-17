<!--this readMe file is about management addon that you can add to your web site.-->
<!--after adding this addon you can manage your users with below actions:-->
<!--1. add new user.-->
<!--2. delete user.-->
<!--3. update user details.-->
<!--...-->
<!---->
<?php
//require_once("../../../../include/config.php");
////echo $_POST['name'];
//echo json_encode(array("name"=>"John","time"=>"2pm"));
////if (isset($_POST['name']) && $_POST['name'] != '') {
////    // get tag
////    $tag = $_POST['name'];
////
////}
//
////if (isset($_POST['roleTitle']))  // if form was submitted (if you came here with form data)
////{
////    $roleTitle = test_input($_POST['roleTitle']);
////
////    if (registerNewRole($roleTitle)) {
////        echo "success";
////    } else {
////        echo "Error";
////    }
////}
//
////Initialize variables to null.
//$nameError ="";
//$emailError ="";
//$genderError ="";
//$websiteError ="";
//// On submitting form below function will execute.
//if(isset($_POST['submit'])){
//    if (empty($_POST["name"])) {
//        $nameError = "Name is required";
//    } else {
//        $name = test_input($_POST["name"]);
//// check name only contains letters and whitespace
//        if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
//            $nameError = "Only letters and white space allowed";
//        }
//    }
//    if (empty($_POST["email"])) {
//        $emailError = "Email is required";
//    } else {
//        $email = test_input($_POST["email"]);
//// check if e-mail address syntax is valid or not
//        if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) {
//            $emailError = "Invalid email format";
//        }
//    }
//    if (empty($_POST["website"])) {
//        $website = "";
//    } else {
//        $website = test_input($_POST["website"]);
//// check address syntax is valid or not(this regular expression also allows dashes in the URL)
//        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
//            $websiteError = "Invalid URL";
//        }
//    }
//    if (empty($_POST["comment"])) {
//        $comment = "";
//    } else {
//        $comment = test_input($_POST["comment"]);
//    }
//    if (empty($_POST["gender"])) {
//        $genderError = "Gender is required";
//    } else {
//        $gender = test_input($_POST["gender"]);
//    }
//}
//function test_input($data) {
//    $data = trim($data);
//    $data = stripslashes($data);
//    $data = htmlspecialchars($data);
//    return $data;
//}
////php code ends here
//?>
<?php
//
///**
// * File to handle all API requests
// * Accepts GET and POST
// *
// * Each request will be identified by TAG
// * Response will be JSON data
//
///**
// * check for POST request
////load template
//if (isset($_POST['tag']) && $_POST['tag'] != '') {
//// get tag
//$tag = $_POST['tag'];
//
//// include db handler
//require_once 'include/DB_Functions.php';
//$db = new DB_Functions();
//
