<?php

require "includes/db_config.php";

    if (!empty($_POST)) {
        $user_id = $_POST['user_id'];
        $wallpaper_id = $_POST['wallpaper_id'];

        $sql = <<<SQL
INSERT INTO user_downloads (id_user, id_wallpaper)
VALUES ({$user_id},{$wallpaper_id})
ON DUPLICATE KEY UPDATE id_user=id_user;
SQL;
        $result= mysqli_query($conn,$sql);
    }
    die();
