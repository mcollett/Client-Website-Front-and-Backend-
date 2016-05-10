<?php

if (($_POST['username']=="jam"&&$_POST['password']=="lick22")||($_POST['username']=="step"&&$_POST['password']=="apples4434")) {
	setcookie("username", "WCM", time()+7200);
	header("Location: content.php");
} else {
	echo "Wrong credentials.";
}

?>