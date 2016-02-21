<?php
require_once("../../../../include/config.php");
$userId = 1;
$currentUser = selectById('tblusers', $userId)[0];
?>

<div class="panel panel-default">
    <div class="panel-heading">change user profile pic</div>
    <div class="panel-body">
        <img class="img-thumbnail" src="<?php echo "include/uploads/" . $currentUser['userPic'] ?>">
        <a id="changePic" href="#"><h5> تغییر </h5></a>
    </div>
    <div class="panel-footer">
        <form id="frmChangePic" action="include/upload.php" method="post" enctype="multipart/form-data">
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input id="txtUserId2" name="userId" value="<?php echo $currentUser['userId']; ?>" hidden>
            <input type="submit" value="Upload Image" name="submit" class="btn btn-info btn-block">
        </form>
    </div>
</div>
<script>
    $(document).ready(function () {

        $("#frmChangePic").css("opacity", "0");
        $("#changePic").click(function (e) {
            e.preventDefault();
            $("#frmChangePic").css("opacity", "1");
        });
    });
</script>