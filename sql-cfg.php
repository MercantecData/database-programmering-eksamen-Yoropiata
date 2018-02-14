<?php

$dbhost     = "localhost";
$dbuser     = "root";
$dbpassword = "";
$database = "DatabaseExam";

$conn=mysqli_connect($dbhost, $dbuser, $dbpassword, $database);

if ($conn->connect_error) {
    echo "error in database";
    die("Connection failed: " . $conn->connect_error);
}
?>