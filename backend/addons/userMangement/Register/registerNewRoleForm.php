<?php
require_once("../../../../include/config.php");

?>
<div class="col-xs-12 col-sm-6">
    <div>
        <h4 class="">
            New Role
        </h4>
        <fieldset>
            <div class="form-group input-group">
                                      <span class="input-group-addon">
                                         <span class="fa fa-user-md"></span>
                                      </span>
                <input class="form-control" placeholder="roleTitle" id="roleTitle" type="text"
                       required="">
            </div>
            <div class="form-group">
                <button id="btnAddRole" class="btn btn-success btn-block">
                    ADD
                </button>
            </div>
        </fieldset>
    </div>
    <div id=message></div>

</div>
<script>
    $(document).ready(function () {

        $("#btnAddRole").click(function () {
            var roleTitle = $("#roleTitle").val();
            if (roleTitle == '') {
                alert("لطفا عنوان مورد نظر را وارد نمایید.");
            } else {


                $('#message').load("backend/addons/usermangement/register/registerNewRole.php",
                    {
                        roleTitle: roleTitle

                    });

                $("#showRoles").load('backend/addons/usermangement/show/showAllRoles.php');

            }
        });
    });
</script>