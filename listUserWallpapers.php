<!DOCTYPE html>
<?php
require "includes/db_config.php";
require "./verify.php";
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./node_modules/@yaireo/tagify/dist/tagify.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.10.1/css/mdb.min.css" rel="stylesheet">
    <title>WallPapersPlease</title>
</head>
<body>
<div class="container">
    <?php
    if(isset($_GET['error'])){
        $error = $_GET['error'];
        if($error === 'success')
            echo "<h4 class=\"text-center text-success mt-3\">Action completed successfully</h4>";
    }
     //var_dump($_SESSION);
    if(!isset($_SESSION['id_user'])){
        echo "
<button type=\"button\" class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#exampleModalLong\">
  Login
</button>";
    }
    else{
        include "./downloads_count.php";
        echo"
  <a class=\"btn btn-primary\" href=\"./imageupload.php\">Upload</a>
  <a class=\"btn btn-primary\" href=\"./index.php\">Search</a>
  <a class=\"btn btn-primary\" href=\"logout.php\">Logout</a>";
    }
    $user = $_SESSION['id_user'];
    $sql = "SELECT * FROM wallpaper w JOIN user u ON w.id_user = u.id_user WHERE w.id_user = '$user' ORDER BY id_wallpaper DESC ";
    $query = mysqli_query ($conn,$sql);
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
            <form method=\"post\" action=\"updateUserWallpapers.php\">
                <img src=\"images/{$result['desktop']}\" alt=\"$altName[0]\" width=\"332\" height=\"332\"><br>
        </div>
        <div class=\"col-sm-8 col-md-6 col-lg-8\">
                <input type='hidden' name='title' value=\"{result['title']\"><strong>Title: </strong>{$result['title']}<br>
                <strong>Uploader: </strong>{$result['username']}<br>
                <strong>Number of downloads: </strong>{$row[0]}<br>
                <input type=\"hidden\" name=\"id\" value=\"{$result['id_wallpaper']}\" >
                <button class=\"btn btn-primary mt-3\"  name=\"update\">UPDATE</button>
                <button class=\"btn btn-primary mt-3\"  name=\"delete\">DELETE</button>
            </form>
        </div>
     </div>
     <hr>
";
    }
    ?>

