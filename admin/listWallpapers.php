<?php
require "../includes/db_config.php";
session_start();
if (isset($_SESSION['admin'])) {
    if(($_SESSION['admin'] == 0) or ($_SESSION['admin'] == 1)) {
       header("Location: ../index.php");
    }
} else {
    header("Location: ../index.php");
}
$sql = "SELECT * FROM wallpaper w JOIN user u ON w.id_user = u.id_user ORDER BY id_wallpaper DESC ";
$query = mysqli_query ($conn,$sql);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Admin | Wallpapers</title>
</head>
<nav class="navbar navbar-expand navbar-dark bg-primary">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="../index.php">Početna</a>
        </li>
        <li>
            <a class = "nav-link" href="listWallpapers.php">List Wallpapers</a>
        </li>
        <li>
            <a class = "nav-link" href="listUsers.php">List Users</a>
        </li>
    </ul>
</nav>

<div class="container mt-5">
    <?php

//    while($result = mysqli_fetch_assoc($query)){
//        $name = $result['desktop'];
//        $altName = explode (".",$name);             // izracunavanje broja downloada
//        $sql2 ="SELECT COUNT(*) as downloads_count FROM user_downloads as ud
//            JOIN  wallpaper as w ON ud.id_wallpaper = w.id_wallpaper
//            WHERE w.id_user = {$result['id_user']} GROUP BY ud.id_wallpaper";
//        $query2 = mysqli_query ($conn,$sql2);
//        $row = mysqli_fetch_row($query2);
    while($result = mysqli_fetch_assoc($query)){
        $name = $result['desktop'];
        $altName = explode (".",$name);             // izracunavanje broja downloada
        $sql2 ="SELECT COUNT(*) as downloads_count FROM user_downloads as ud            
            JOIN  wallpaper as w ON ud.id_wallpaper = w.id_wallpaper
            WHERE w.id_user = {$result['id_user']} GROUP BY ud.id_wallpaper";
        $query2 = mysqli_query ($conn,$sql2);
        $row = mysqli_fetch_row($query2);
        echo"
     <div class=\"row\">
        <div class=\"col-sm-4 col-md-12 col-lg-4\">
            <form method=\"post\" action=\"deleteWallpapers.php\">
                <img src=\"../images/{$result['desktop']}\" alt=\"$altName[0]\" width=\"332\" height=\"332\"><br>
        </div>
        <div class=\"col-sm-8 col-md-6 col-lg-8\">
                <strong>Title: </strong>{$result['title']}<br>
                <strong>Uploader: </strong>{$result['username']}<br>
                <strong>Number of downloads: </strong>{$row[0]}<br>
                <input type=\"hidden\" name=\"id\" value=\"{$result['id_wallpaper']}\" >
                <button class=\"btn btn-primary mt-3\"  name=\"delete\">DELETE</button>
            </form>
        </div>
     </div>
     <hr>
";
    }
    ?>
</div>