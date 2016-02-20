<?php
function successRegisterMessage($message)
{
    echo "<div class=\"alert alert-success\" role=\"alert\">";
    echo $message."</div>";

}
function failedRegisterMessage($message)
{
    echo "<div class=\"alert alert-danger\" role=\"alert\">";
    echo $message."</div>";

}