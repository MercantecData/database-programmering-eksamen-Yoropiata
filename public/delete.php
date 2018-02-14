<?php
include "../sql-cfg.php";
if(isset($_GET['user'])) {
    $deleteid = $_GET['user'];
    $sql = "DELETE FROM users WHERE id = $deleteid";
    if(!$conn->query($sql)) {
        echo "failed to delete user.";
        die();
    }
}
if(isset($_GET['image'])) {
    $deleteid = $_GET['image'];
    $sql = "DELETE FROM images WHERE id = $deleteid";
    if(!$conn->query($sql)) {
        echo "failed to delete user.";
        die();
    }
}
header("Location: userlist.php");//redirects back
?>
