<?php

session_start();

setcookie("username", "", time()-3600);
header("Location: login.php");

?>