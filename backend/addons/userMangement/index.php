<?php
require_once("../../../include/config.php");
?>
<div class="container">
    <div id="row">
        <div class="col-xs-6 col-xs-offset-3">
            <?php echo "user Management index"."<hr>"; ?>
            <button class="btn-success btn-block" id="showAll">show all users list</button>

            <button class="btn-success btn-block">edit user detail</button>
            <button class="btn-success btn-block" id="registerNew">register new user</button>
            <pre id="pre"></pre>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $("#showAll").click(function () {
            $("#pre").load('backend/addons/usermangement/show/show.php');
        });
        $("#registerNew").click(function () {
            $("#pre").load('backend/addons/usermangement/register/registerForm.php');
        });
    });

</script>