<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "DatabaseExam");
$register = isset($_POST["register"], $_POST["username"], $_POST["password"]);
$login = isset($_POST["login"], $_POST["username"], $_POST["password"]);
if($register) {
    $usrname = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    $sql = "SELECT id, name FROM users WHERE username = '$usrname' AND password = '$password'";

    //echo $sql . "<br>";

    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    //var_dump($row);
    $id = $row["id"];
    $name = $row["name"];
    $_SESSION['userID'] = $id;
    $_SESSION["userName"] = $name;
}

if($login || $register) {
    $usrname = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    $sql = "SELECT id, name FROM users WHERE username = '$usrname' AND password = '$password'";

    //echo $sql . "<br>";

    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    //var_dump($row);
    $id = $row["id"];
    $name = $row["name"];
    $_SESSION['userID'] = $id;
    $_SESSION["userName"] = $name;
}
header("Location: index.php");//redirects back