<?php
require_once("../../include/config.php");

?>
<div class="container">
    <div class="row center-block">
        <div class="col-xs-4 col-xs-offset-4 ">

            <form accept-charset="UTF-8" role="form" id="register-form" method="post" action="<?=$_SERVER['PHP_SELF'];?>">
                <h4 class="">
                    Signin!
                </h4>
                <fieldset>
                    <div class="form-group input-group">
                                      <span class="input-group-addon">
                                         <span class="fa fa-user-md"></span>
                                      </span>
                        <input class="form-control" placeholder="username" name="username" type="text" value=""
                               required="">
                    </div>
                    <div class="form-group input-group">
                              <span class="input-group-addon">
                                <span class="fa fa-envelope"></span>
                              </span>
                        <input class="form-control" placeholder="Email" name="userEmail" type="email" required=""
                               autofocus="">
                    </div>
                    <div class="form-group input-group">
                                  <span class="input-group-addon">
                                     <span class="fa fa-asterisk"></span>
                                  </span>
                        <input class="form-control" placeholder="رمز عبور" name="userPassword" type="password" value=""
                               required="">
                    </div>
                    <div class="form-group input-group">
                                  <span class="input-group-addon">
                                     <span class="fa fa-rouble"></span>
                                  </span>
                        <select class="form-control">
                            <?php
                           $roles = select_all('tblroles');
                            foreach ($roles as $role) {
                            ?>
                            <option><?php echo $role['roleTitle'];?></option>
                            <?php }?>
                        </select>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-block">
                            Register
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
    </div>
</div>
<?php
if (isset($_POST))  // if form was submitted (if you came here with form data)
{
    $username = $_POST['username'];
    $userEmail = $_POST['userEmail'];
    $userPassword = $_POST['userPassword'];
    $userRole = 2;
    echo $username;
    if(register_user($username,$userEmail,$userPassword,$userRole)){
        echo "success";
    }else{
        echo "Error";
    }
    ?>
    <script>
        //        $("#pre").load('layouts/admin/users.php');
    </script>
    <?php
}
?>