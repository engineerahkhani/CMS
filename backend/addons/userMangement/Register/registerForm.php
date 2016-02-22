<?php
require_once("../../../../include/config.php");
$currentUserId = 1;
?>
<div class="container-fluid">
    <div class="col-xs-6 col-xs-offset-3">
        <h4 class="">
            Signin!
        </h4>
        <fieldset>
            <div class="form-group input-group ">
                                      <span class="input-group-addon">
                                         <span class="fa fa-user-md"></span>
                                      </span>
                <input class="form-control" placeholder="username" name="username" type="text" id="txtUsername"
                       required="required">

            </div>

            <div class="form-group input-group">
                              <span class="input-group-addon">
                                <span class="fa fa-envelope"></span>
                              </span>
                <input class="form-control" placeholder="Email" name="userEmail" type="email" required="required" id="txtUserEmail">
            </div>
            <div class="form-group input-group">
                                  <span class="input-group-addon">
                                     <span class="fa fa-asterisk"></span>
                                  </span>
                <input class="form-control" placeholder="رمز عبور" name="userPassword" type="password" id="txtUserPassword"
                       required="required">
            </div>
            <div class="form-group input-group">
                                  <span class="input-group-addon">
                                     <span class="fa fa-rouble"></span>
                                  </span>
                <select class="form-control" id="selRoleTitle">
                    <?php
                    $roles = select_all('tblroles');
                    foreach ($roles as $role) {
                        ?>
                        <option value="<?php echo $role['id']; ?>"><?php echo $role['roleTitle']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <input  id="txtUserId" name="userId" value="<?php echo $currentUserId;?>" hidden>
                <button type="submit" class="btn btn-success btn-block" id="btnRegisterNewUser">
                    Register
                </button>
            </div>
            <div id="message"></div>
        </fieldset>
    </div>
</div>

<script>
    $(document).ready(function(){
        //change password
        $("#btnRegisterNewUser").click(function () {

            var userId = $("#txtUserId").val();
            var username = $("#txtUsername").val();
            var userEmail = $("#txtUserEmail").val();
            var userPassword = $("#txtUserPassword").val();
            var roleTitle = $( "#selRoleTitle" ).val();

            if (username == '' || userEmail == null || userPassword =='') {
                alert("فیلد مورد نظر را پر نماید.");
            } else {
                $('#message').load("backend/addons/usermangement/register/register.php",
                    {
                        userId: userId,
                        username: username,
                        userEmail:userEmail,
                        userPassword:userPassword,
                        roleTitle:roleTitle

                    });
                $("#showAdminPanel").load('backend/addons/usermangement/show/showAllUsers.php');
            }


        });

    });
</script>