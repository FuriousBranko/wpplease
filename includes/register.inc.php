<?php
session_start();
include "db_config.php";

    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,$_POST['password1']);
    $password2 = mysqli_real_escape_string($conn,$_POST['password2']);

    $logged = 0;
    $sql2 = "SELECT * FROM user WHERE username = '$username';";
    $result2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn)); // CHECK USERNAME
    $error = 0;
    if (mysqli_num_rows($result2) > 0) {
        $error = 1;
    }
    $password3 = password_hash($password,PASSWORD_DEFAULT);
    $vkey= md5(time().$username);
    $sql = "INSERT INTO user (username, password, email, vkey) values ('$username', '$password3', '$email', '$vkey')";
    var_dump($sql);
    if ($password == $password2 and $error == 0) {
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));





        $to= $email;
        $subject= "Email Verification";
        $message= "<a href='http:/localhost/wpplease/index.php?vkey=$vkey'>Verify email.</a><br>index.php?vkey=$vkey";
        $headers= "From: therealexperimentalmail@gmail.com \r\n";
        $headers .= "MIME-Version: 1.0"."\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8"."\r\n";

        mail($to,$subject,$message,$headers);




        header("location: ../index.php");
    } elseif ($error == 1 and $password != $password2) {
        header("Location: ../index.php?nav=3");
    } elseif ($error == 1) {
        header("Location: ../index.php?nav=1");
    } elseif ($password != $password2) {
        header("Location: ../index.php?nav=2");
    }




