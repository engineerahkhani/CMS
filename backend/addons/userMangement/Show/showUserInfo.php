<?php
require_once("../../../../include/config.php");
$userId = 1;
$currentUser = select_user_by_userId($userId)[0];
$userRole = select_RoleTitle_by_RoleId($currentUser['RoleId']);
$userRole = $userRole[0]['roleTitle'];
?>
<div class="container-fluid">
<div class="row">
    <div class="col-xs-4">
        <img
            src="<?php echo "include/uploads/".$currentUser['userPic']; ?>"
            alt="" class="img-rounded img-responsive"/>
    </div>
    <div class="col-xs-8">
        <div class="jumbotron">
            <div class="container text-center">
                <h4><?php echo $currentUser['userName'];?></h4>
                <h5><?php echo  $userRole;?></h5><hr>
                <h5><?php echo $currentUser['userEmail'];?> &nbsp;<i class="fa fa-envelope fa-2x"></i></h5>
                <br/> <i class=""></i> <?php echo dateconvertfromdb($currentUser['userSignDate']);?>
                <br/> <i class=""></i> <?php echo dateconvertfromdb($currentUser['userLastLoginDate']);?></p>
            </div>
        </div>
    </div>
</div>
</div>