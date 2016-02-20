<?php
require_once("../../../../include/config.php");
$userId = 1;
$currentUser = selectById('tblusers',$userId)[0];
$userRole = select_RoleTitle_by_RoleId($currentUser['RoleId']);
$userRole = $userRole[0]['roleTitle'];
?>
<div class="container-fluid">
<div class="col-xs-12 col-sm-6">
    <div class="row">
        <div>
            <h4 class="">
                Update
            </h4>

            <fieldset>
                <div class="form-group input-group">
                      <span class="input-group-addon">
                          <span class="fa fa-user-md"></span>
                      </span>
                    <input class="form-control" placeholder="<?php echo $currentUser['userName'];?>" name="username" type="text" required="" id="txtUsername">
                </div>
                <div class="form-group input-group">
                      <span class="input-group-addon">
                            <span class="fa fa-envelope"></span>
                      </span>
                    <input class="form-control" placeholder="<?php echo $currentUser['userEmail'];?>" name="userEmail" type="email" required="" autofocus="" id="txtUserEmail">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-info btn-block" id="updateUsernameEmail">UPDATE
                    </button>
                </div>
                <div id="message"></div>
            </fieldset>
        </div>
    </div>
    <div class="row">
        <form accept-charset="UTF-8" role="form" id="change-password-form" method="post" action="backend/addons/usermangement/edit/editPassword.php">
            <h4 class="">
                Update Password
            </h4>
            <fieldset>
                <div class="form-group input-group">
                      <span class="input-group-addon">
                          <span class="fa fa-user-md"></span>
                      </span>
                    <input class="form-control" placeholder="old password" name="oldPassword" type="password"  required="">
                </div>
                <div class="form-group input-group">
                      <span class="input-group-addon">
                          <span class="fa fa-user-md"></span>
                      </span>
                    <input class="form-control" placeholder="New password" name="newPassword" type="password"  required="">
                </div>
                <div class="form-group input-group">
                  <span class="input-group-addon">
                        <span class="fa fa-envelope"></span>
                  </span>
                    <input class="form-control" placeholder="New Password (again)" name="reNewPassword" type="password" required="" autofocus="">

                </div>
                <input name="userId" value="<?php echo $currentUser['userId'];?>" hidden>
                <div class="form-group">
                    <button type="submit" class="btn btn-info btn-block">Change
                    </button>
                </div>
                <div id="message2"></div>

            </fieldset>
        </form>
    </div>
</div>
<div class="col-xs-12 col-sm-6">
    <div class="profile-header-container">

        <div class="profile-header-img">
            <img class="img-thumbnail" src="<?php echo "include/uploads/".$currentUser['userPic'] ?>">
            <div>
                <a id="changePic" href="#"><h5> تغییر </h5></a>
            </div>
            <form id="frmChangePic" action="include/upload.php" method="post" enctype="multipart/form-data">
                Select image to upload:
                <input type="file" name="fileToUpload" id="fileToUpload">
                <input name="userId" value="<?php echo $currentUser['userId'];?>" hidden>
                <input type="submit" value="Upload Image" name="submit" class="btn btn-info btn-block" >
            </form>
        </div>
    </div>
</div>
</div>
<script>
    $(document).ready(function(){
        //update  User name email
        $("#updateUsernameEmail").click(function () {
            var username = $("#txtUsername").val();
            var userEmail = $("#txtUserEmail").val();
            if (username == '' || userEmail == null) {
                alert("لطفا عنوان مورد نظر را وارد نمایید.");
            } else {
                $('#message').load("backend/addons/usermangement/edit/editUsernameEmail.php",
                    {
                        username: username,
                        userEmail:userEmail
                    });
            }
        });
        $("#frmChangePic").css("opacity","0");
       $("#changePic").click(function(e){
           e.preventDefault();
           $("#frmChangePic").css("opacity","1");
       }) ;
    });
</script>