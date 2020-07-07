<?php
require "../includes/db_config.php";
if(isset($_POST['delete'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $sql = "DELETE FROM wallpaper WHERE id_wallpaper = '$id'";
    $query = mysqli_query($conn, $sql);
    if (mysqli_affected_rows($conn) < 1) {
        header("Location: index.php?error=errorQuery&submit=list");
        exit();
    }
    header("Location: index.php?error=success&submit=list");
    exit();
}
