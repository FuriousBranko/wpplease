<?php
  require "includes/db_config.php";
session_start();
if (isset($_SESSION['admin'])) {
    if($_SESSION['admin'] == 0) {
        header("Location: index.php");
    }
} 
// else {
//     header("Location: index.php");
// }

  ?>
<!DOCTYPE html>
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
  
<form action="admin.php" method="get">
<input type="submit" class="button" name="tile" value="Users" />
<input type="submit" class="button" name="tile" value="Verify Wallpapers" /></form>

<?php
if (isset($_GET['tile'])) {
    switch ($_GET['tile']) {
        case 'Users':
            users($conn);
            break;
        case 'Verify Wallpapers':
            verifyWallpapers($conn);
            break;
    }
}
  // display users:
  function users($conn) {
    
    $result= mysqli_query($conn, "SELECT * FROM `user`");
    if(mysqli_num_rows($result) > 0){
        
        while($row = mysqli_fetch_array($result)){
            $id= $row['id_user'];
            $user= $row['username'];
            $v= $row['verified'];
            echo"
            <p>Username: {$user}</p>
            <p>Verification: ";
            if ($v) {echo "Is Verified";}
            else echo"Isn't Verified";
            echo "</p>";
            echo "<form action=\"updateWP.php\" method=\"POST\">";
            echo "<button type=\"submit\" class=\"button\" name=\"delUser\" value=\"{$id}\">Delete</button></form><hr>";
        }
    }
}
//display unverified wallpapers:
    function verifyWallpapers($conn) {
        $result= mysqli_query($conn, "SELECT * FROM `wallpaper`");
        if(mysqli_num_rows($result)> 0 ){
            echo "<div class=\"container\"><div class=\"row\">";
            
            while($row = mysqli_fetch_array($result)){
                $id= $row['id_wallpaper'];
                $title= $row['title'];
                $file= $row['desktop'];
                $v= $row['verified'];
                echo"
                <div class=\"col-4 border text-center\">
                <p>$title</p>
                <img class=\"img-fluid img-thumbnail\" src=\"./images/$file\" alt=\"$title\">";
                if (!$v){
                    echo "<form action=\"updateWP.php\" method=\"POST\">";
                    echo"<button type=\"submit\" class=\"button\" name=\"verify\" value=\"{$id}\">Verify</button></form>";
                }
                echo "<form action=\"updateWP.php\" method=\"POST\">";
                echo "<button type=\"submit\" class=\"button\" name=\"delete\" value=\"{$id}\">Delete</button></form>
                </div>
                <hr>";
            }
            echo "</div></div>";
        }
    }
?>



<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.10.1/js/mdb.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="js/index.js"></script>
</body>
</html>