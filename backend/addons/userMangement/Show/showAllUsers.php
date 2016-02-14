<?php
require_once("../../../../include/config.php");

$users = select_all('tblusers');
?>
<table id="tblUsers" class="table table-responsive table-hover table-bordered">
    <caption>
        <h3 class="text-info">All Users</h3>
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
            <td><?php echo $user['userName']; ?></td>
            <td><?php echo $user['userEmail']; ?></td>
            <td><?php echo dateconvertfromdb($user['userSignDate']); ?></td>
            <td><?php echo dateconvertfromdb($user['userLastLoginDate']); ?></td>
            <td><?php $userRoleArray = select_RoleTitle_by_RoleId($user['RoleId']);
                echo $userRoleArray[0]['roleTitle']; ?></td>
            <td>
                <span id="editUser" class="fa fa-edit fa-2x" type="button" data-toggle="modal"
                      data-target="#myModal">
                </span>
            </td>
            <td><span id="deleteUser" class="fa fa-remove fa-2x" type="button" data-toggle="modal"
                      data-target="#DeleteIt">
                </span>
            </td>
        </tr>
        <form accept-charset="UTF-8" role="form" id="register-form" method="post"
              action="backend/addons/usermangement/edit/editUsernameEmail.php">
        <tr id="editUserForm">
                <td></td>
                <td><input class="form-control" name="username" type="text" value="<?php echo $user['userName']; ?>"
                           required="">
                </td>
                <td><input class="form-control" name="userEmail" type="email" value="<?php echo $user['userEmail']; ?>"
                           required=""></td>
                <td><input class="form-control" name="username" type="text" value="<?php echo $user['userSignDate']; ?>"
                           required=""></td>
                <td><input class="form-control " name="username" type="text"
                           value="<?php echo $user['userLastLoginDate']; ?>"
                           required=""></td>
                <td><input class="form-control" name="username" type="text" value="<?php echo $user['RoleId']; ?>"
                           required=""></td>
                <td>
                    <button class="btn btn-success btn-block"  type="submit" >Update</button>
                </td>
                <td>
                    <button class="btn btn-default btn-block" name="Cancel">Cancel</button>
                </td>

        </tr>
        </form>

        <?php ++$i;
    } ?>
</table>
<div class="col-xs-10 col-xs-offset-1">
    <ul class="pagination pagination-sm no-margin pull-right">
        <li><a href="#">&laquo;</a></li>
        <li><a href="#" class="active">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">&raquo;</a></li>
    </ul>
</div>
<script>
    $(document).ready(function () {

//        $("#editUser").click(function () {
//            $("#editUserForm").toggleClass('hidden');
//        });

    });

</script>

