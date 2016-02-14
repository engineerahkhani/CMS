<?php
require_once("../../../../include/config.php");

?>
                <form accept-charset="UTF-8" role="form" id="register-form" method="post" action="backend/addons/usermangement/register/register.php">
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
                        </div>
                    </fieldset>
                </form>

