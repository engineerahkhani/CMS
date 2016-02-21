<?php
require_once("../../../include/config.php");

$userId = 1;
$currentUser = selectById('tblusers', $userId)[0];
$userRole = select_RoleTitle_by_RoleId($currentUser['RoleId']);
$userRole = $userRole[0]['roleTitle'];
?>
<link href="<?php SitRoot ?>/CMS/backend/addons/usermangement/css/styleSheet.css" rel="stylesheet">

<div class="container-fluid">

    <div class="row jumbotron">
        <div id="showUserInfo">
            //load user info
        </div>
    </div>

    <ul class="nav nav-tabs nav-justified">
        <li><a id="userDetailEdit" data-toggle="tab" href="#menu1"> <span class="fa fa-cog"></span></a></li>
        <li><a id="admin" data-toggle="tab" href="#menu2"> <span class="fa fa-user-secret"></span></a></li>
        <li><a id="role" data-toggle="tab" href="#menu3"> <span class="fa fa-calendar"></span></a></li>
    </ul>

    <div class="tab-content ">
        <div id="menu1" class="tab-pane fade">
            <div class="col-xs-12 col-sm-6" id="showEditUsernameForm">
                <!--show edit userName Form -->
            </div>
            <div class="col-xs-12 col-sm-6" id="showEditPasswordForm">
                <!--show edit userPassword Form -->
            </div>
            <div class="col-xs-12 col-sm-6" id="showEditUserPicForm">
                <!--show edit userPic Form -->
            </div>
        </div>
        <div id="menu2" class="tab-pane fade">
            <div id="showAdminPanel">
                <!--show admin panel-->
            </div>
            <div id="showRegisterUserForm" class="col-xs-12">
                <!--show admin panel-->
            </div>
        </div>
        <div id="menu3" class="tab-pane fade">
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

</body>
</html>

<script>
    $(document).ready(function () {

            $("#showUserInfo").load('backend/addons/usermangement/show/showUserInfo.php');

        $("#userDetailEdit").click(function () {
            $("#showEditUsernameForm").load('backend/addons/usermangement/edit/editUsernameEmailForm.php');
            $("#showEditUserPicForm").load('backend/addons/usermangement/edit/editUserPicForm.php');
            $("#showEditPasswordForm").load('backend/addons/usermangement/edit/editPasswordForm.php');

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
