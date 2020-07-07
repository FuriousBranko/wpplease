<?php
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Admin</title>
</head>
<body>>
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
</body>
<?php
if(isset($_GET['error'])){
    $error = $_GET['error'];
    if($error === 'success')
        echo "<h4 class=\"text-center text-success mt-3\">Action completed successfully</h4>";
}