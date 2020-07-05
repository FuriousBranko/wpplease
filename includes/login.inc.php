<?php
session_start();
include("db_config.php");
//include("../verify.php");

$id=0;
$username = mysqli_real_escape_string($conn, $_POST["username"]);
$password = mysqli_real_escape_string($conn, $_POST["password"]);

$sql = "SELECT * FROM user WHERE username = '$username'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
if(mysqli_num_rows($result) > 0 && !password_verify($password,$row['password']))
{
    $id = $row["id_user"];
    $power = $row["power"];
    $verified = $row["verified"];
    if($verified==0){
        header("Location: ../index.php?error=666");
    }
    $_SESSION["id_user"] = $id;
    $_SESSION["username"] = $username;
    $_SESSION["admin"] = $power;
    header("Location: ../index.php");
    exit();
}
else {
    header("Location: ../index.php?error=2");
    exit();
}