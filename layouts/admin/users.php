<?php
require_once("../../include/config.php");

echo ROOT;

echo "<br>" . "Users sec";
?>

<div class="container">
    <div class="row ">
        <div class="col-xs-12">
            <div class="col-xs-4">
                <div class="info-box text-center">
                    <span class="info-box-icon "><i class="fa fa-users fa-2x"></i></span>

                    <div class="info-box-content">
                        <div class="info-box-text">Users Count:</div>
                        <span class="info-box-number"><small class="badge"><?php $users = select_all('tblusers');
                                echo count($users); ?></small></span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div>

            <div class="col-xs-4">
                <div class="card">
                    <canvas class="header-bg" width="250" height="70" id="header-blur"></canvas>
                    <div class="avatar">
                        <img src="" alt=""/>
                    </div>
                    <div class="content">
                        <p>Web Developer <br>
                            More description here</p>
                        <p>
                            <button type="button" class="btn btn-default">Contact</button>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-10">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">کاربران سیستم</h3>
                    <?php //showdate(); ?>
                </div><!-- /.box-header -->
                <div class="box-body">
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
                                <td><?php $userRoleArray =  select_RoleTitle_by_RoleId($user['RoleId']);
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
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                    <ul class="pagination pagination-sm no-margin pull-right">
                        <li><a href="#">&laquo;</a></li>
                        <li><a href="#" class="active">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">&raquo;</a></li>
                    </ul>
                </div>
            </div><!-- /.box -->
        </div>
    </div>
    <div class="row">
        <button id="registerNewUser" class="btn-success">New User</button>
        <div id="registerNewUserForm"></div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $("#registerNewUser").click(function () {
            $("#registerNewUserForm").load('layouts/admin/RegisterNewUserForm.php');
        });
        $("#deleteUser").click(function () {
            var customerId = $('#tblUsers').find(".userId").text();
            alert(customerId);
        });
    });
</script>
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
                <form accept-charset="UTF-8" role="form" id="login-form" method="post">
                    <h4 class="">
                        Signin!
                    </h4>
                    <fieldset>
                        <div class="form-group input-group">
                              <span class="input-group-addon">
                                <span class="fa fa-user"></span>
                              </span>
                            <input class="form-control" placeholder="name" name="userName" type="text" required=""
                                   autofocus="">
                        </div>
                        <div class="form-group input-group">
                              <span class="input-group-addon">
                                        <span class="fa fa-user"></span>
                              </span>
                            <input class="form-control" placeholder="Email" name="email" type="email" required=""
                                   autofocus="">
                        </div>
                        <div class="form-group input-group">
                                  <span class="input-group-addon">
                                     <span class="fa fa-car"></span>
                                  </span>
                            <input class="form-control" placeholder="رمز عبور" name="password" type="password" value=""
                                   required="">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">
                                Access
                            </button>
                            <p class="help-block">
                                <a class="pull-right text-muted" href="#" id="olvidado">
                                    <small>Forgot your password?</small>
                                </a>
                                <a class="pull-left text-muted" href="#" id="olvidado2">
                                    <small>Signup!</small>
                                </a>
                            </p>
                        </div>
                    </fieldset>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="DeleteIt" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Delete?</h4>
            </div>
            <div class="modal-body">
                <form id="Delete-form" method="post" action="<?php SitRoot ?>/CMS/index.php">
                    <fieldset>
                        <input type="hidden" name="userId" value="3">
                        <div class="form-group">
                            <button type="submit" class="btn btn-danger btn-block">
                                Delete
                            </button>
                            <button type="reset" class="btn btn-default btn-block">
                                Cancel
                            </button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
