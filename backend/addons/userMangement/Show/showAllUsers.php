<?php
require_once("../../../../include/config.php");

$users = select_all('tblusers');
?>
<div class="container-fluid" id="allUsersTbl">
    <div class="row">
        <div class="col-xs-12">
            <table id="tblUsers" class="table table-responsive table-hover ">
                <caption>
                    <h3 class="text-info">All Users</h3>
                    <div id="message"></div>
                </caption><!-- /.box-header -->
                <tr>
                    <th>#</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Register Date</th>
                    <th>Last Login</th>
                    <th>Role</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <?php
                $i = 1;
                foreach ($users as $user) {
                    ?>
                    <tr>
                        <td><?php echo "$i" . "." ?></td>
                        <td dataUserName="<?php echo $user['userName']; ?>" id="oldUserName"><?php echo $user['userName']; ?></td>
                        <td id="oldUserEmail"><?php echo $user['userEmail']; ?></td>
                        <input id="oldUserRegDate" value="<?php echo ($user['userSignDate']); ?>" hidden>
                        <td><?php echo dateconvertfromdb($user['userSignDate']); ?></td>
                        <input id="oldUserLastLoginDate" value=" <?php echo ($user['userLastLoginDate']); ?>" hidden>
                        <td ><?php echo dateconvertfromdb($user['userLastLoginDate']); ?></td>
                        <td><?php $userRoleArray = select_RoleTitle_by_RoleId($user['RoleId']);
                            echo $userRoleArray[0]['roleTitle']; ?></td>
                        <td>
                            <span  class="fa fa-edit fa-2x editUser" type="button" data-toggle="modal" data-target="#myModal">
                            </span>
                        </td>
                        <td><span class="fa fa-remove fa-2x deleteUser" type="button" data-toggle="modal" data-target="#DeleteIt">
                            </span>
                        </td>
                    </tr>
                    <span>
                        <tr  class="hidden editUserForm" >
                            <td></td>
                            <td>
                            <input  id="txtUserId" name="userId" value="<?php echo $user['id'];?>" hidden>
                            <input id="txtUsername" class="form-control" name="username" type="text"
                                       value="<?php echo $user['userName']; ?>"
                                       required="">
                            </td>
                            <td><input id="txtUserEmail" class="form-control" name="userEmail" type="email"
                                       placeholder="<?php echo $user['userEmail']; ?>"></td>
                            <td><input id="txtUserSignDate" class="form-control" name="username" type="text"
                                       placeholder="<?php echo $user['userSignDate']; ?>"></td>
                            <td><input id="txtUserLastLoginDate" class="form-control " name="username" type="text"
                                       placeholder="<?php echo $user['userLastLoginDate']; ?>"></td>
                            <td>
                                <select class="form-control" id="selRoleTitle">
                                        <?php
                                        $roles = select_all('tblroles');
                                        foreach ($roles as $role) {
                                            ?>
                                            <option value="<?php echo $role['id']; ?>"><?php echo $role['roleTitle']; ?>
                                            </option>
                                 <?php } ?>
                                </select>
                             </td>
                            <td>
                                <button id="updateUserDetail" class="btn btn-success btn-block" type="submit">Update</button>
                            </td>
                            <td>
                                <button class="btn btn-default btn-block" name="Cancel">Cancel</button>
                            </td>
                        </tr>
                    </span>
                    <!-- Modal -->
                    <div id="DeleteUserModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">اخطار</h4>
                                </div>
                                <div class="modal-body">
                                    <p>کاربر با مشخصات زیر پاک خواهد شد.</p>
                                    <span class="fa fa-user">&nbsp;</span>UserName:<input id="selectedUser" class="disabled" value=""/>
                                </div>
                                <div class="modal-footer">
                                    <button  type="button" class="btn btn-danger btn-block btnDeleteUser" data-dismiss="modal">Delete</button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--end modal-->
                    <?php ++$i;
                } ?>
            </table>

        </div>
    </div>
    <div class="row text-center">
        <div class="col-xs-10 col-xs-offset-1">
            <ul class="pagination pagination-sm no-margin ">
                <li><a href="#">&laquo;</a></li>
                <li><a href="#" class="active">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">&raquo;</a></li>
            </ul>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $(".deleteUser").click(function(){
            var UserName = $(this).parent('td').data('dataUserName');
            $("#selectedUser").val(UserName);
            $("#DeleteUserModal").modal('show');
        });
        $(".btnDeleteUser").click(function(){
            // var userId = $("#roleTitle").val();
            userId = 19;
            $('#message').load("backend/addons/usermangement/delete/deleteUser.php",
                {
                    userId: userId
                });
            $("#showAdminPanel").load('backend/addons/usermangement/show/showAllUsers.php');

        });

        $(".editUser").click(function () {
//            var i = $(".editUserForm").eq(1).attr("id");

            $(this).closest('tr').next('tr').toggleClass('hidden');
        });
        //update  User name email register date login date user role
        $("#updateUserDetail").click(function () {

            var userId = $("#txtUserId").val();
            var username = $("#txtUsername").val();
            var userEmail = $("#txtUserEmail").val();
            var userRegDate = $("#txtUserSignDate").val();
            var userLastLoginDate = $("#txtUserLastLoginDate").val();
            var roleTitle = $( "#selRoleTitle" ).val();

            if (username == '') {
               username = $("#oldUserName").text();
            }
            if (userEmail == '') {
                userEmail =  $("#oldUserEmail").text();
            }
            if (userRegDate == '') {
                userRegDate =  $("#oldUserRegDate").val();
            }
            if (userLastLoginDate == '') {
                userLastLoginDate =  $("#oldUserLastLoginDate").val();
            }
                $('#message').load("backend/addons/usermangement/edit/editUserDetails.php",
                    {
                        userId: userId,
                        username: username,
                        userEmail:userEmail,
                        userRegDate:userRegDate,
                        userLastLoginDate:userLastLoginDate,
                        roleTitle:roleTitle

                    });
            $("#showAdminPanel").load('backend/addons/usermangement/show/showAllUsers.php');
        });


    });

</script>

