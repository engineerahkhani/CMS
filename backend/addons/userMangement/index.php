<?php
require_once("../../../include/config.php");

$userId = 1;
$currentUser = select_user_by_userId($userId)[0];
$userRole = select_RoleTitle_by_RoleId($currentUser['RoleId']);
$userRole = $userRole[0]['roleTitle'];
?>
<link href="<?php SitRoot ?>/CMS/backend/addons/usermangement/css/styleSheet.css" rel="stylesheet">

<div class="container-fluid">
    <div class="row">
        <div class=" col-xs-12  user-details">
            <div class="user-image text-center">
                <img src="<?php echo "include/uploads/" . $currentUser['userPic']; ?>" width="120" height="120"
                     alt="profile_pic" title="profile_pic" class="img-circle"/>
            </div>
            <div class="user-info-block">
                <div class="user-heading">
                    <h3 class="text-muted "><?php echo $currentUser['userName']; ?></h3>
                </div>
                <ul class="navigation">
                    <li class="active">
                        <a data-toggle="tab" href="#information" id="userInfo">
                            <span class="fa fa-user"></span>
                        </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#settings" id="userDetailEdit">
                            <span class="fa fa-cog"></span>
                        </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#adminPanel" id="admin">
                            <span class="fa fa-user-secret"></span>
                        </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#roles" id="role">
                            <span class="fa fa-calendar" ></span>
                        </a>
                    </li>
                </ul>
                <div class="user-body">
                    <div class="tab-content">
                        <div id="information" class="tab-pane active">
                            <div id="showUserInfo">
                                <!--show user info here -->
                            </div>
                        </div>
                        <div id="settings" class="tab-pane">
                            <!--setting -->
                            <div id="showEditForm">
                                <!--show edit Form -->
                            </div>
                        </div>
                        <div id="adminPanel" class="tab-pane">
                            <div id="showAdminPanel">
                                <!--show admin panel-->
                            </div>
                            <div id="showRegisterUserForm" class="col-xs-12">
                                <!--show admin panel-->
                            </div>
                        </div>
                        <div id="roles" class="tab-pane">
                            <div class="container-fluid">
                                <div class="row">
                                    <div id="showRoles">
                                        <!--show admin panel-->
                                    </div>
                                    <div id="showRegisterNewRole">
                                        <!--show admin panel-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $("#showUserInfo").load('backend/addons/usermangement/show/showUserInfo.php');

        $("#userInfo").click(function () {
            $("#showUserInfo").load('backend/addons/usermangement/show/showUserInfo.php');
        });
        $("#userDetailEdit").click(function () {
            $("#showEditForm").load('backend/addons/usermangement/edit/editUserDetailForm.php');
        });
        $("#admin").click(function () {
            $("#showAdminPanel").load('backend/addons/usermangement/show/showAllUsers.php');
            $("#showRegisterUserForm").load('backend/addons/usermangement/register/registerForm.php');
        });
        $("#role").click(function () {
            $("#showRoles").load('backend/addons/usermangement/show/showAllRoles.php');
            $("#showRegisterNewRole").load('backend/addons/usermangement/register/registerNewRoleForm.php');
        });
        $("#registerNew").click(function () {
            $("#pre").load('backend/addons/usermangement/register/registerForm.php');
        });
    });

</script>
