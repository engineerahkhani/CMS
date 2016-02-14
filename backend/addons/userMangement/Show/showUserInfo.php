<?php
require_once("../../../../include/config.php");
$userId = 1;
$currentUser = select_user_by_userId($userId)[0];
$userRole = select_RoleTitle_by_RoleId($currentUser['RoleId']);
$userRole = $userRole[0]['roleTitle'];
?>
<div class="row">
    <div class="col-xs-4">
        <img
            src="<?php echo "include/uploads/".$currentUser['userPic']; ?>"
            alt="" class="img-rounded img-responsive"/>
    </div>
    <div class="col-xs-8">
        <blockquote>
            <p><?php echo $currentUser['userName'];?></p>
            <small><cite title="Source Title"><?php echo  $userRole;?><i
                        class="glyphicon glyphicon-map-marker"></i></cite></small>
        </blockquote>
        <p><i class="fa fa-envelope fa-2x"></i><?php echo $currentUser['userEmail'];?>
            <br/> <i class="glyphicon glyphicon-globe"></i> <?php echo dateconvertfromdb($currentUser['userSignDate']);?>
            <br/> <i class="glyphicon glyphicon-gift"></i> <?php echo dateconvertfromdb($currentUser['userLastLoginDate']);?></p>
    </div>
</div>
