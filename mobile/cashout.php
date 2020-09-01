<?php
session_start();
require "./db_config.php";
if (!isset($_GET['earnings'])){
    header("Location: index.php");
}
$username= $_SESSION['username'];
$id = $_SESSION['id_user'];
$sql2 = "SELECT * FROM user WHERE username = '$username'";
$result2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn)); // CHECK USERNAME
$em= $result2['email']; 
$cash = $_GET['earnings'];       
        $to= $email;
        $subject= "Email Verification";
        $message= "<p>You have cashed out $cash</p>";
        $headers= "mobile@wpp.vardump.me \r\n";
        $headers .= "MIME-Version: 1.0"."\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8"."\r\n";
        mail($to,$subject,$message,$headers);
        $sql = "UPDATE user SET cashedout = {$cash} WHERE id_user = {$result2['id_user']}";
        $result = mysqli_query($conn, $sql);
        header("Location: index.php");