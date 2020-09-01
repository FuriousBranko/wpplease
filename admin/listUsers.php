<?php
require "../includes/db_config.php";
session_start();
if (isset($_SESSION['admin'])) {
    if(($_SESSION['admin'] == 0)) {
       header("Location: ../index.php");
    }
} else {
    header("Location: ../index.php");
}
$sql = "SELECT * FROM user ORDER BY id_user DESC ";
$query = mysqli_query ($conn,$sql);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Admin | Users</title>
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
    while($result = mysqli_fetch_assoc($query)){
        $sql2 ="SELECT COUNT(*) as downloads_count FROM user_downloads as ud            
            JOIN  wallpaper as w ON ud.id_wallpaper = w.id_wallpaper
            WHERE w.id_user = {$result['id_user']} GROUP BY ud.id_user";
        $query2 = mysqli_query ($conn,$sql2);
        $row = mysqli_fetch_row($query2);
        echo"
     <div class=\"row\">
        <div class=\"col-sm-4 col-md-12 col-lg-4\">
            <form method=\"post\" action=\"deleteUsers.php\">
        </div>
        <div class=\"col-sm-8 col-md-6 col-lg-8\">
                <strong>Uploader: </strong>{$result['username']}<br>
                <strong>Email: </strong>{$result['email']}<br>
                <strong>Power level (0-2): </strong>{$result['power']}<br>
                <strong>Number of downloads: </strong>{$row[0]}<br>
                <input type=\"hidden\" name=\"id\" value=\"{$result['id_user']}\" >
                <button class=\"btn btn-primary mt-3\"  name=\"delete\">DELETE</button>
            </form>
        </div>
     </div>
     <hr>
";
    }
    ?>
</div>