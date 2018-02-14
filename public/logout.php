<?php
if(isset($_POST["submit"])) {
	session_start();
	session_unset();
	header("Location: index.php");
}