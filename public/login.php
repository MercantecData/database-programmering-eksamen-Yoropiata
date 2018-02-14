<?php
session_start();

include "../sql-cfg.php"; //Gør brug af min egen sql $conn fil. Den er også ude af public så hvis php-compileren skulle bryde sammen er credentials heller ikke public.

function getUserData($username) {
    include "../sql-cfg.php";
    $username = mysqli_real_escape_string($conn, $username);
    $sql = "SELECT id, name, username, salt, hash FROM users WHERE username='$username'";
    $userQuery = mysqli_query($conn, $sql);
    $userData = mysqli_fetch_array($userQuery);
    return $userData;
}

function insert_query($username, $salt, $hash) {
    include "../sql-cfg.php";
    $username = mysqli_real_escape_string($conn, $username);    
    $sql = "INSERT INTO users(username, salt, hash, name) VALUES ('$username', '$salt', '$hash', '$username')";
    $result = mysqli_query($conn, $sql);
    if($result) { //Successfully inserted!
        echo "Successfully inserted!";
        return true;
    } else { //Failed to insert!
        echo "Failed to insert!";
        return false;
    }
}

function generateSalt($length = 64) {
    $salt = openssl_random_pseudo_bytes($length);
    $salt = base64_encode($salt);
    return $salt; 
}

function hashPassword($salt, $password, $keyLength = 64, $iterations = 10000) {
    $keyLength = 64;
    $iterations = 10000;
    $hash = openssl_pbkdf2($password, $salt, $keyLength, $iterations, 'sha256');
    $hash = base64_encode($hash);
    return $hash;
}

$registerAction = isset($_POST["register"], $_POST["username"], $_POST["password"]);
$loginAction = isset($_POST["login"], $_POST["username"], $_POST["password"]);

if($registerAction) {
    echo "register<br>";
    $usrname = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = $_POST["password"];
    $salt = generateSalt();
    $hash = hashPassword($salt, $password);
    if(insert_query($usrname, $salt, $hash)) {
        $loginAction = true;
    } else {
        $loginAction = false;
    }
}

if($loginAction) {
    echo "login<br>";
    include "../sql-cfg.php";
    $usrname = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = $_POST["password"];
    if($userdata = getUserData($usrname)) {
        if($userdata["hash"] == hashPassword($userdata["salt"], $password)) {
            //Success
            echo "success";
            $_SESSION['userID'] = $userdata["id"];
            $_SESSION["userName"] = $userdata["name"];
        } else {
            //incorrect password.
            echo $userdata["hash"] . "<br>" . hashPassword($userdata["salt"], $password);
            echo "failure";
        }
    } else {
        //User Doesn't Exist
        echo "user doesn't exist";
    }
}
header("Location: index.php");//redirects back