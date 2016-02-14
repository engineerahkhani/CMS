<?php
require_once("../../../../include/config.php");

if (isset($_POST))  // if form was submitted (if you came here with form data)
{
    $username = $_POST['username'];
    $userEmail = $_POST['userEmail'];
    $userPassword = $_POST['userPassword'];
    $userRole = 2;
    echo $username;
    if(register_user($username,$userEmail,$userPassword,$userRole)){
        echo "success";
    }else{
        echo "Error";
    }
    ?>
    <script>
        //        $("#pre").load('layouts/admin/users.php');
    </script>
    <?php
}
?>