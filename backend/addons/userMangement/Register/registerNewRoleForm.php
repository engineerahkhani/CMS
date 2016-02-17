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
                <input class="form-control" placeholder="roleTitle" id="roleTitle" name="roleTitle" type="text" value=""
                       required="">
            </div>
            <div class="form-group">
                <button id="btnAddRole"  class="btn btn-success btn-block">
                    ADD
                </button>
            </div>
        </fieldset>
    </div>
    <div class="alert alert-success" role="alert">Well done! You successfully read this important alert message.</div>
    <div class="alert alert-danger" role="alert">Oh snap! Change a few things up and try submitting again.</div>

</div>
<script>
 $(document).ready(function(){
     var roleTitle =  $('#roleTitle').val();

     $("#btnAddRole").click(function(){
         $.post("backend/addons/usermangement/register/registerNewRole.php",
             {name:'ali'},
             function(data, status){
                 alert("Data: " + data.name + "\nStatus: " + status);
             });
     });
 });
</script>