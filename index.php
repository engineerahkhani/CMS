<?php
require_once("include/config.php");
session_start();
$validUserId = $_SESSION["validUserId"] = 1;
$validUser = select_user_by_userId($validUserId)[0];
?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>AsreMajazi CMS</title>
</head>
<body>
<div id="wrapper">
    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <a href="index.php">WebSiteName</a>
        <div class="avatar">
            <img src="<?php echo "include/uploads/" . $validUser['userPic']; ?>" width="80" height="80"
                 class="img-responsive img-circle"/>
        </div>
        <li data-toggle="collapse" href="#collapseExample" aria-expanded="false"
            aria-controls="collapseExample">
            <a href="#"><span class="fa fa-connectdevelop"></span>&nbsp;Contact</a>
        </li>
        <li class="collapse" id="collapseExample">
            <a href="#"><span class="fa fa-connectdevelop"></span>&nbsp;subContent</a>
        </li>
        </ul>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <!--navbar-->
                <nav class="navbar navbar-default  navbar-fixed-top">
                    <div class="container-fluid">
                            <span id="menu-toggle" >
                                <span class="fa fa-2x fa-align-justify absolute-center"></span>
                            </span>
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $validUser['userName']; ?>
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <div class="card">
                                            <div class="avatar">
                                                <img src="<?php echo "include/uploads/" . $validUser['userPic']; ?>" class="img-circle img-thumbnail"/>
                                            </div>
                                            <div class="content">
                                                <p><?php echo $validUser['userName']; ?><br>
                                                    More description here</p>
                                                <p>
                                                    <button type="button" class="btn btn-info btn-block" id="profile">profile</button>
                                                    <button type="button" class="btn btn-info btn-block" id="profile">LogOUt</button>
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li id="validUser"><a href="#"><span class="fa fa-bell fa-2x"></span> </a></li>
                        </ul>
                    </div>
                </nav>
                <!--end navbar-->
                <div id="pre">
                    <div class="col-xs-10 col-xs-offset-1">
                        <div class="jumbotron">
                            <div class="container text-center">
                                <h1>AsreMajazi CMS</h1>
                                <p>Mission, Vission & Values</p>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="row center-block">
                            <div class="col-xs-4 text-center">
                                <div class="well">
                                    <h4>Users</h4>
                                    <p>1 Million</p>
                                </div>
                            </div>
                            <div class="col-xs-4 text-center">
                                <div class="well">
                                    <h4>Users</h4>
                                    <p>1 Million</p>
                                </div>
                            </div>
                            <div class="col-xs-4 text-center">
                                <div class="well">
                                    <h4>Users</h4>
                                    <p>1 Million</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Menu Toggle Script -->
<script>
    $(document).ready(function () {
        $("#menu-toggle").click(function (e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });

        $("#profile").click(function () {
            $("#pre").load('backend/addons/usermangement/index.php');
        });
    });
</script>

</body>

</html>
