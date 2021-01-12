<?php
session_start();
if(isset($_SESSION["user_name"])){
echo "{\"User\":\"".$_SESSION["user_name"]."\", \"status\":\"logout\" }";
unset($_SESSION);
session_destroy();
}

?>