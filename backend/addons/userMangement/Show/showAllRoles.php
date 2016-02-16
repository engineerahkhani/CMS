<?php
require_once("../../../../include/config.php");

$roles = select_all('tblroles');
?>
        <div class="col-xs-12 col-sm-6">
            <table id="tblRoles" class="table table-responsive table-hover table-bordered">
                <caption>
                    <h3 class="text-info">All Roles</h3>
                </caption><!-- /.box-header -->
                <tr>
                    <th>#</th>
                    <th>Role</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <?php
                $i = 1;
                foreach ($roles as $role) {
                    ?>
                    <tr>
                        <td><?php echo "$i" . "." ?></td>
                        <td><?php echo $role['roleTitle']; ?></td>
                        <td><span id="editRole" class="fa fa-edit fa-2x" type="button">
                </span></td>
                        </td>
                        <td><span id="deleteRole" class="fa fa-remove fa-2x" type="button" data-toggle="modal"
                                  data-target="#DeleteIt">
                </span>
                        </td>
                    </tr>
                    <form accept-charset="UTF-8" role="form" id="register-form" method="post"
                          action="backend/addons/Rolemangement/edit/editRolenameEmail.php">
                        <tr id="editRoleForm" class="hidden">
                            <td></td>
                            <td><input class="form-control" name="Rolename" type="text"
                                       value="<?php echo $role['roleTitle']; ?>"
                                       required="">
                            </td>
                            <td>
                                <button class="btn btn-success btn-block" type="submit">Update</button>
                            </td>
                            <td>
                                <button class="btn btn-default btn-block" name="Cancel">Cancel</button>
                            </td>

                        </tr>
                    </form>
                    <?php ++$i;
                } ?>
            </table>

        </div>
<script>
    $(document).ready(function () {

        $("#editRole").click(function () {
            $("#editRoleForm").toggleClass('hidden');
        });

    });

</script>

