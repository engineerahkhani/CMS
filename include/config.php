
<?php
define('ROOT', __DIR__ .'/');
define('SitRoot',  $_SERVER['DOCUMENT_ROOT'] .'/');

require_once(ROOT."functions.php");
require_once(ROOT."config.php");
require_once(ROOT."UiFunctions.php");
require_once(ROOT . "dataBaseHandlerFunction.php");
require_once(ROOT . "messages.php");



function db_connect()
{
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $db_name = "test";

// Create connection
    $conn = mysqli_connect("$servername", "$username", "$password", "$db_name");
    mysql_query('set character set utf8;');

// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else
        return $conn;
}

?>
<meta charset="utf-8">
<link href="<?php SitRoot?>/CMS/css/styleSheet.css" rel="stylesheet">
<link href="<?php SitRoot?>/CMS/css/bootstrap.css" rel="stylesheet">
<link href="<?php SitRoot?>/CMS/css/font-awesome.min.css" rel="stylesheet">
<script src="<?php SitRoot?>/CMS/js/jquery.js"></script>
<script src="<?php SitRoot?>/CMS/js/bootstrap.js"></script>



