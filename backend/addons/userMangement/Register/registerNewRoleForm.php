<?php
require_once("../../../../include/config.php");
?>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">خطا!</h4>
            </div>
            <div class="modal-body">
                <p>لطفا عنوان مورد نظر را وارد نمایید.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-block" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<!--end modal-->
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
                       required="required">
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
                $("#myModal").modal('show');
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