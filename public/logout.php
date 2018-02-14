<?php
if(isset($_POST["submit"])) {
	sessionstart();
	session_unset();
	header("Location: index.php");
}