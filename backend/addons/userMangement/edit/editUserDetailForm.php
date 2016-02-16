<?php
require_once("../../../../include/config.php");
$userId = 1;
$currentUser = select_user_by_userId($userId)[0];
$userRole = select_RoleTitle_by_RoleId($currentUser['RoleId']);
$userRole = $userRole[0]['roleTitle'];
?>
<div class="container-fluid">
<div class="col-xs-12 col-sm-6">
    <div class="row">
        <form accept-charset="UTF-8" role="form" id="register-form" method="post" action="backend/addons/usermangement/edit/editUsernameEmail.php">
            <h4 class="">
                Update
            </h4>
            <div class="alert alert-success" role="alert">Well done! You successfully read this important alert message.</div>
            <div class="alert alert-danger" role="alert">Oh snap! Change a few things up and try submitting again.</div>
            <fieldset>
                <div class="form-group input-group">
                      <span class="input-group-addon">
                          <span class="fa fa-user-md"></span>
                      </span>
                    <input class="form-control" placeholder="" name="username" type="text" value="<?php echo $currentUser['userName'];?>" required="">
                </div>
                <div class="form-group input-group">
                      <span class="input-group-addon">
                            <span class="fa fa-envelope"></span>
                      </span>
                    <input class="form-control" placeholder="Email" name="userEmail" type="email" required="" autofocus="" value="<?php echo $currentUser['userEmail'];?>">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-info btn-block">UPDATE
                    </button>
                </div>
            </fieldset>
        </form>
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
            </fieldset>
        </form>
    </div>
</div>
<div class="col-xs-12 col-sm-6">
    <div class="profile-header-container">
        <div class="profile-header-img">
            <img class="img-thumbnail" src="<?php echo "include/uploads/".$currentUser['userPic'] ?>" />
            <!-- badge -->
            <div class="rank-label-container">
                <button class="btn btn-info btn-block "><span class="fa fa-edit fa-2x"></span> </button>
            </div>
            <form action="include/upload.php" method="post" enctype="multipart/form-data">
                Select image to upload:
                <input type="file" name="fileToUpload" id="fileToUpload">
                <input name="userId" value="<?php echo $currentUser['userId'];?>" hidden>
                <input type="submit" value="Upload Image" name="submit" class="btn btn-info btn-block" >
            </form>
        </div>
    </div>
</div>
</div>