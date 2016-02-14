<?php
require_once("../../include/config.php");

$userId = 1;
$currentUser = select_user_by_userId($userId)[0];
$userRole = select_RoleTitle_by_RoleId($currentUser['RoleId']);
$userRole = $userRole[0]['roleTitle'];
?>
    <div class="container ">
        <div class="row">
            <div class=" col-xs-12 user-details">
                <div class="user-image">
                    <img src="<?php echo "include/uploads/".$currentUser['userPic']; ?>" width="120" height="120"
                         alt="profile_pic" title="profile_pic" class="img-circle">
                </div>
                <div class="user-info-block">
                    <div class="user-heading">
                        <h3><?php echo $currentUser['userName'];?></h3>
                        <span class="help-block"><?php echo $userRole; ?></span>
                    </div>
                    <ul class="navigation">
                        <li class="active">
                            <a data-toggle="tab" href="#information">
                                <span class="fa fa-user"></span>
                            </a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#settings">
                                <span class="fa fa-cog"></span>
                            </a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#email">
                                <span class="fa fa-envelope"></span>
                            </a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#events">
                                <span class="fa fa-calendar"></span>
                            </a>
                        </li>
                    </ul>
                    <div class="user-body">
                        <div class="tab-content">
                            <div id="information" class="tab-pane active">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <img
                                            src="<?php echo "include/uploads/".$currentUser['userPic']; ?> ?>"
                                            alt="" class="img-rounded img-responsive"/>
                                    </div>
                                    <div class="col-xs-8">
                                        <blockquote>
                                            <p><?php echo $currentUser['userName'];?></p>
                                            <small><cite title="Source Title"><?php echo  $userRole;?><i
                                                        class="glyphicon glyphicon-map-marker"></i></cite></small>
                                        </blockquote>
                                        <p><i class="fa fa-envelope fa-2x"></i><?php echo $currentUser['userEmail'];?>
                                            <br
                                            /> <i class="glyphicon glyphicon-globe"></i> <?php echo dateconvertfromdb($currentUser['userSignDate']);?>
                                            <br/> <i class="glyphicon glyphicon-gift"></i> <?php echo dateconvertfromdb($currentUser['userLastLoginDate']);?></p>
                                    </div>
                                </div>
                            </div>
                            <div id="settings" class="tab-pane">
<!--                               setting -->
                                <div class="col-xs-12 col-sm-6">
                                    <div class="row">
                                    <form accept-charset="UTF-8" role="form" id="register-form" method="post" action="<?= $_SERVER['PHP_SELF']; ?>">
                                        <h4 class="">
                                            Update
                                        </h4>
                                        <div class="alert alert-success" role="alert">Well done! You successfully read this important alert message.</div>
                                        <div class="alert alert-danger" role="alert">Oh snap! Change a few things up and try submitting again.</div>
                                        <fieldset>
                                            <div class="form-group input-group">
                                                              <span class="input-group-addon">
                                                                              <span class="fa fa-user-md"></span>
                                                              </span>
                                                <input class="form-control" placeholder="" name="username" type="text" value="<?php echo $currentUser['userName'];?>" required="">
                                            </div>
                                            <div class="form-group input-group">
                                                              <span class="input-group-addon">
                                                                                <span class="fa fa-envelope"></span>
                                                              </span>
                                                <input class="form-control" placeholder="Email" name="userEmail" type="email" required="" autofocus="" value="<?php echo $currentUser['userEmail'];?>">
                                            </div>
                                            <div class="form-group">
                                                    <button type="submit" class="btn btn-info btn-block">UPDATE
                                                    </button>
                                            </div>
                                        </fieldset>
                                    </form>
                                    </div>
                                    <div class="row">
                                    <form accept-charset="UTF-8" role="form" id="change-password-form" method="post" action="ChangePassword.php">
                                        <h4 class="">
                                            Update Password
                                        </h4>
                                        <fieldset>
                                            <div class="form-group input-group">
                                                              <span class="input-group-addon">
                                                                              <span class="fa fa-user-md"></span>
                                                              </span>
                                                <input class="form-control" placeholder="old password" name="oldPassword" type="password"  required="">
                                            </div>
                                            <div class="form-group input-group">
                                                              <span class="input-group-addon">
                                                                              <span class="fa fa-user-md"></span>
                                                              </span>
                                                <input class="form-control" placeholder="New password" name="newPassword" type="password"  required="">
                                            </div>
                                            <div class="form-group input-group">
                                                              <span class="input-group-addon">
                                                                                <span class="fa fa-envelope"></span>
                                                              </span>
                                                <input class="form-control" placeholder="New Password (again)" name="reNewPassword" type="password" required="" autofocus="">

                                            </div>
                                            <input name="userId" value="<?php echo $currentUser['userId'];?>" hidden>
                                            <div class="form-group">
                                                    <button type="submit" class="btn btn-info btn-block">Change
                                                    </button>
                                            </div>
                                        </fieldset>
                                    </form>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="profile-header-container">
                                        <div class="profile-header-img">
                                            <img class="img-thumbnail" src="<?php echo "include/uploads/".$currentUser['userPic'] ?>" />
                                            <!-- badge -->
                                            <div class="rank-label-container">
                                              <button class="btn btn-info btn-block "><span class="fa fa-edit fa-2x"></span> </button>
                                            </div>
                                                <form action="include/upload.php" method="post" enctype="multipart/form-data">
                                                    Select image to upload:
                                                    <input type="file" name="fileToUpload" id="fileToUpload">
                                                    <input name="userId" value="<?php echo $currentUser['userId'];?>" hidden>
                                                    <input type="submit" value="Upload Image" name="submit" class="btn btn-info btn-block" >
                                                </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="email" class="tab-pane">
                                <h4>cahange role rea, time line</h4>
                            </div>
                            <div id="events" class="tab-pane">
                                <h4>Events</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style type="text/css">
        body {
            background: #EAEAEA;
        }
.alert-danger{
    opacity: 1;
}
.alert-success{
    opacity:1;
}
        .user-details {
            position: relative;
            padding: 0;
        }

        .user-details .user-image {
            position: relative;
            z-index: 1;
            text-align: center;
        }

        .user-image img {
            clear: both;
            margin: auto;
            position: relative;
        }

        .user-details .user-info-block {
            width: 100%;
            position: absolute;
            top: 70px;
            background: rgb(255, 255, 255);
            z-index: 0;
            padding-top: 35px;
            text-align: center;
        }

        .user-info-block .user-heading {
            width: 100%;
            text-align: center;
            margin: 15px 0 0;
        }

        .user-info-block .navigation {
            text-align: center;
            float: left;
            width: 100%;
            margin-right: auto;
            margin-left: auto;

            list-style: none;
            border-bottom: 1px solid #428BCA;
            border-top: 1px solid #428BCA;
        }

        .navigation li {
            float: left;
            margin: 0;
            padding: 0;
        }

        .navigation li a {
            padding: 20px 30px;
            float: left;
        }

        .navigation li.active a {
            background: #428BCA;
            color: #fff;
        }

        .user-info-block .user-body {
            float: left;
            padding: 5%;
            width: 90%;
        }

        .user-body .tab-content > div {
            float: left;
            width: 100%;
        }

        .user-body .tab-content h4 {
            width: 100%;
            margin: 10px 0;
            color: #333;
        }
        /**
 * Profile image component
 */
        .profile-header-container{
            margin: 0 auto;
            text-align: center;
        }

        .profile-header-img {
            padding: 54px;
        }

        /**
         * Ranking component
         */
        .rank-label-container {
            margin-top: 10px;
                z-index: 100;
            text-align: center;
        }


        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .fadeIn {
            animation-name: fadeIn;
        }

    </style>
<?php
if (isset($_POST))  // if form was submitted (if you came here with form data)
{
    $userId = 4;
    //check that userId exist?
    $username = $_POST['username'];
    $userEmail = $_POST['userEmail'];

    if (update_userName_userEmail($userId, $username, $userEmail)) {
       ?>
        //success
        <script>
            $('.alert-success').addClass("fadeIn");
        </script>
        <?php
    } else {
        ?>
        //error
        <script>
            $('.alert-danger').css('opacity','1');
        </script>
        <?php
    }
    ?>
    <script>
        //        $("#pre").load('layouts/admin/users.php');
    </script>
    <?php
}
?>