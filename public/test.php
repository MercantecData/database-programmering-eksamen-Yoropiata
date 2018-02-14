<?php
function hashPassword($salt, $password, $keyLength = 64, $iterations = 10000) {
    $keyLength = 64;
    $iterations = 10000;
    $hash = openssl_pbkdf2($password, $salt, $keyLength, $iterations, 'sha256');
    $hash = base64_encode($hash);
    return $hash;
}

$salt = "zP1yn4XaTroThvL/LkjuIQ1P1rq7l6POqeGFJN4na2QIezrBGplYsmg2ETIg03vIVATtzkmBCj86aAVP46fruw==";
$password = "friendshipism4gic";
$user = "fShy34";
echo hashPassword($salt, $password);

?>