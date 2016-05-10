<?php
if ($_COOKIE['username']=="WCM") { header("Location: content.php"); } else { header("Location: login.php"); }
?>