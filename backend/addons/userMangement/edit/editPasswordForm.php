<?php
require_once("../../../../include/config.php");
$userId = 1;
$currentUser = selectById('tblusers', $userId)[0];
?>
<h4 class="">
    Update Password
</h4>
<fieldset>
    <div class="form-group input-group">
                      <span class="input-group-addon">
                          <span class="fa fa-user-md"></span>
                      </span>
        <input class="form-control" placeholder="Old Pssword" name="oldPassword" type="password" required="required"
               id="txtOldPassword">
    </div>
    <div class="form-group input-group">
                      <span class="input-group-addon">
                          <span class="fa fa-user-md"></span>
                      </span>
        <input class="form-control" placeholder="New Password" name="newPassword" type="password" required="required"
               id="txtNewPassword">
    </div>
    <div class="form-group input-group">
                  <span class="input-group-addon">
                        <span class="fa fa-envelope"></span>
                  </span>
        <input class="form-control" placeholder="New Password (again)" name="reNewPassword" type="password" required="required"
               autofocus="" id="txtReNewPassword">

    </div>
    <input id="txtUserId" name="userId" value="<?php echo $currentUser['userId']; ?>" hidden>

    <div class="form-group">
        <button type="submit" class="btn btn-info btn-block" id="changeUserPassword">Change
        </button>
    </div>
    <div id="message2"></div>

</fieldset>
<script>
    $(document).ready(function () {
        //change password
        $("#changeUserPassword").click(function () {

            var userId = $("#txtUserId2").val();
            var oldPassword = $("#txtOldPassword").val();
            var newPassword = $("#txtNewPassword").val();
            var reNewPassword = $("#txtReNewPassword").val();
            if (oldPassword == '' || newPassword == null || reNewPassword == '') {
                alert("فیلد مورد نظر را پر نماید.");
            } else {
                $('#message2').load("backend/addons/usermangement/edit/editPassword.php",
                    {
                        userId: userId,
                        oldPassword: oldPassword,
                        newPassword: newPassword,
                        reNewPassword: reNewPassword

                    });
            }
        });

    });
</script>