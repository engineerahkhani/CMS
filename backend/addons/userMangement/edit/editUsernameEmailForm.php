<?php
require_once("../../../../include/config.php");
$userId = 1;
$currentUser = selectById('tblusers', $userId)[0];
?>
<h4 class="">Update</h4>

<fieldset>
    <div class="form-group input-group">
                      <span class="input-group-addon">
                          <span class="fa fa-user-md"></span>
                      </span>
        <input class="form-control" placeholder="<?php echo $currentUser['userName']; ?>" name="username" type="text"
               required="required" id="txtUsername">
    </div>
    <div class="form-group input-group">
                      <span class="input-group-addon">
                            <span class="fa fa-envelope"></span>
                      </span>
        <input class="form-control" placeholder="<?php echo $currentUser['userEmail']; ?>" name="userEmail" type="email"
               required="required" autofocus="" id="txtUserEmail">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-info btn-block" id="updateUsernameEmail">UPDATE
        </button>
    </div>
    <div id="message"></div>
</fieldset>
<script>
    $(document).ready(function () {
        //update  User name email
        $("#updateUsernameEmail").click(function () {
            var username = $("#txtUserId").val();
            var username = $("#txtUsername").val();
            var userEmail = $("#txtUserEmail").val();
            if (username == '' || userEmail == null) {
                alert("لطفا عنوان مورد نظر را وارد نمایید.");
            } else {
                $('#message').load("backend/addons/usermangement/edit/editUsernameEmail.php",
                    {
                        userId: userId,
                        username: username,
                        userEmail: userEmail
                    });
            }
        });

    });
</script>