<?php
require_once("../../../../include/config.php");

if (isset($_POST))  // if form was submitted (if you came here with form data)
{
    $userId = $_POST['userId'];
    if (delete_user($userId)) {
        echo "success";
    } else {
        echo "oo";
    }
    ?>
    <script>
        //        $("#pre").load('layouts/admin/users.php');
    </script>
    <?php
}
?>