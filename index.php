<?php
require_once("include/config.php");
session_start();
$validUserId = $_SESSION["validUserId"] = 1 ;
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
        <!--navbar-->
        <nav class="navbar navbar-default  navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">WebSiteName</a>
                </div>
                <button id="menu-toggle" type="button">
                    <span class="fa fa-3x fa-align-justify"></span>
                </button>
                <ul class="nav navbar-nav">
                    <li><a href="#">Home</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Admin
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li id="admin"><a href="#">Users</a></li>
                            <li><a href="#">Page 1-2</a></li>
                            <li><a href="#">Page 1-3</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $validUser['userName']; ?>
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="card">

                                    <div class="avatar">
                                        <img src="<?php echo "include/uploads/".$validUser['userPic']; ?>" alt=""/>
                                    </div>
                                    <div class="content">
                                        <p><?php echo $validUser['userName']; ?><br>
                                            More description here</p>
                                        <p>
                                            <button type="button" class="btn btn-info" id="profile">profile</button>
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
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <div class="avatar">
                <img src="<?php echo "include/uploads/".$validUser['userPic']; ?>" width="80" height="80" class="img-responsive img-circle" />
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
                    <div class="col-lg-12">
                        <h1>this section should load from layout</h1>
                        <!--                    --><?php //echo ROOT; ?>
                        <?php echo SitRoot; ?>
                        <div id="pre">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->

    <!-- Bootstrap Core JavaScript -->

    <!-- Menu Toggle Script -->
    <script>
        $(document).ready(function () {
            $("#menu-toggle").click(function (e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });
            $("#admin").click(function () {
                $("#pre").load('layouts/admin/users.php');
            });
            $("#profile").click(function () {
                $("#pre").load('layouts/users/profile.php');

            });
        });
    </script>

    </body>

    </html>
<?php
if (isset($_POST))  // if form was submitted (if you came here with form data)
{
    $userId = $_POST['userId'];
    echo $userId;
    if (delete_user($userId)) {
        echo "success";
    } else {
        echo "oo";
    }
    ?>
    <script>
        $("#pre").load('layouts/admin/users.php');
    </script>
    <?php
}
?>