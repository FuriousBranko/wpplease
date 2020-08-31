<?php
  require "includes/db_config.php";
  session_start();
//   var_dump($_POST);
  if(isset($_POST['delete'])){
    $id = $_POST['delete'];
    $sql = "DELETE FROM wallpaper where id_wallpaper = {$id}";
    $result = mysqli_query($conn, $sql);
    // var_dump($result);
    header("Location: admin.php?tile=Verify+Wallpapers");
  }
  else if(isset($_POST['verify'])){
    $id = $_POST['verify'];
    $sql = "UPDATE wallpaper SET verified = 1 WHERE id_wallpaper = {$id}";
    $result = mysqli_query($conn, $sql);
    header("Location: admin.php?tile=Verify+Wallpapers");
  }
  else if(isset($_POST['delUser'])){
    $id = $_POST['delUser'];
    $sql = "DELETE FROM user WHERE id_user = {$id}";
    $result = mysqli_query($conn, $sql);
    header("Location: admin.php?tile=Users");
  }
  else
  header("Location: admin.php");
  ?>