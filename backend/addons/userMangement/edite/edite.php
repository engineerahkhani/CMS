<?php
if (isset($_POST))  // if form was submitted (if you came here with form data)
{
    $userId = 4;
    //check that userId exist?
    $username = $_POST['username'];
    $userEmail = $_POST['userEmail'];

    if (update_userName_userEmail($userId, $username, $userEmail)) {
        ?>
        //success
        <script>
            $('.alert-success').addClass("fadeIn");
        </script>
        <?php
    } else {
        ?>
        //error
        <script>
            $('.alert-danger').css('opacity','1');
        </script>
        <?php
    }
    ?>
    <script>
        //        $("#pre").load('layouts/admin/users.php');
    </script>
    <?php
}
?>