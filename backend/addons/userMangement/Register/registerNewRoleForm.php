<?php
require_once("../../../../include/config.php");

?>
<div class="col-xs-12 col-sm-6">
    <form accept-charset="UTF-8" role="form" id="register-form" method="post"
          action="backend/addons/usermangement/register/registerNewRole.php">
        <h4 class="">
      New Role
        </h4>
        <fieldset>
            <div class="form-group input-group">
                                      <span class="input-group-addon">
                                         <span class="fa fa-user-md"></span>
                                      </span>
                <input class="form-control" placeholder="roleTitle" name="roleTitle" type="text" value=""
                       required="">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success btn-block">
                    ADD
                </button>
            </div>
        </fieldset>
    </form>
</div>