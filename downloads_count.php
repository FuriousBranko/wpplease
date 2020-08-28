<?php

require_once "includes/db_config.php";

$wallpaper = [];

$sql = <<<SQL
SELECT COUNT(*) as downloads_count, ud.id_wallpaper, w.title FROM user_downloads as ud
JOIN  wallpaper as w ON ud.id_wallpaper = w.id_wallpaper
WHERE w.id_user = {$_SESSION['id_user']} GROUP BY ud.id_wallpaper
SQL;
$result= mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($result)){
    $wallpaper[] = [ 'title' =>$row['title'], 'wallpaper_id' =>$row['id_wallpaper'], 'downloads_count' =>$row['downloads_count'] ];
}




$sql = "SELECT COUNT(*) as downloads_count, ud.id_wallpaper, w.title FROM user_downloads as ud
JOIN  wallpaper as w ON ud.id_wallpaper = w.id_wallpaper
WHERE w.id_user = {$_SESSION['id_user']} GROUP BY ud.id_wallpaper";
$result= mysqli_query($conn,$sql);

$row = mysqli_fetch_row($result);
//var_dump($row);
while($row = mysqli_fetch_array($result)){
    $wallpaper[] = [ 'title' =>$row['title'], 'wallpaper_id' =>$row['id_wallpaper'], 'downloads_count' =>$row['downloads_count'] ];
}