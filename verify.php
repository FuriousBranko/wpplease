<?php
require "./includes/db_config.php";
if(isset($_GET['vkey'])){
    $vkey= $_GET['vkey'];
    $vkey= mysqli_real_escape_string($conn,$vkey);

    $sql = "SELECT vkey,verified FROM user WHERE verified=0 AND vkey = '$vkey' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    print_r($result);

if(mysqli_num_rows($result) == 1)
{
    
    $sql = "UPDATE user SET verified='1' where vkey='$vkey'";
    $result = mysqli_query($conn, $sql);
    echo "done";
    header("Location: ./index.php?verified=1");
    //exit();
}
}