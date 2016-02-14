<?php
require_once("../../../../include/config.php");

$users = select_all('tblusers');
?>
<table id="tblUsers" class="table table-responsive  table-bordered">
    <tr>
        <th>#</th>
        <th>UserId</th>
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
            <td class="userId"><?php echo $user['userId']; ?></td>
            <td><?php echo $user['userName']; ?></td>
            <td><?php echo $user['userEmail']; ?></td>
            <td><?php echo dateconvertfromdb($user['userSignDate']); ?></td>
            <td><?php echo dateconvertfromdb($user['userLastLoginDate']); ?></td>
            <td><?php $userRoleArray = select_RoleTitle_by_RoleId($user['RoleId']);
                echo $userRoleArray[0]['roleTitle']; ?></td>
            <td>
                                    <span id="editUser" class="fa fa-edit fa-2x" type="button" data-toggle="modal"
                                          data-target="#myModal"></span>
            </td>
            <td><span id="deleteUser" class="fa fa-remove fa-2x" type="button" data-toggle="modal"
                      data-target="#DeleteIt"></span></td>
        </tr>
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

