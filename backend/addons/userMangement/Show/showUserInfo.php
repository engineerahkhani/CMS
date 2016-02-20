<?php
require_once("../../../../include/config.php");
$userId = 1;
$currentUser = selectById('tblusers',$userId)[0];
$userRole = select_RoleTitle_by_RoleId($currentUser['RoleId']);
$userRole = $userRole[0]['roleTitle'];
?>
<div class="container-fluid">
<div class="row col-xs-12 col-sm-10 col-sm-offset-1 jumbotron">

    <div class="col-xs-6">
        <div >
            <div class="container text-center ">
                <h4 class=" fa fa-user text-right"> نام کاربری: <?php echo $currentUser['userName'];?></h4>
                <h4 class="fa fa-dashboard text-right"> نقش: <?php echo  $userRole;?></h4>
                <h4 class="fa fa-envelope-square text-right"> ایمیل کاربری: <?php echo $currentUser['userEmail'];?></h4>
                <h4 class="fa fa-calendar text-right"> تاریخ ثبت نام: <?php echo dateconvertfromdb($currentUser['userSignDate']);?></h4>
                <h4 class="fa fa-calendar text-right"> آخرین ورود به سیستم:<?php echo dateconvertfromdb($currentUser['userLastLoginDate']);?></h4>
            </div>
        </div>
    </div>
    <div class="col-xs-6">
        <img
            src="<?php echo "include/uploads/".$currentUser['userPic']; ?>"
            alt="" class="img-rounded img-responsive"/>
    </div>
</div>
</div>