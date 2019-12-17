<?php
session_start();
include("db_config.php");

$id=0;
$username = mysqli_real_escape_string($conn, $_POST["username"]);
$password = mysqli_real_escape_string($conn, $_POST["password"]);

$sql = "SELECT * FROM user WHERE username like '%{$username}%'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0 or !password_verify($password,$result['password']))
{
    while($row = $result->fetch_array())//$row = mysqli_fetch_array($result, MYSQLI_BOTH))
    {
        $id = $row["id_user"];
        $power = $row["power"];
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