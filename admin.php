<?
  require "includes/db_config.php";
  require "./verify.php";
  session_start();
  ?>
<form action="admin.php" method="get">
<input type="submit" class="button" name="users" value="Users" />
<input type="submit" class="button" name="verifyWallpapers" value="Verify Wallapapers" /></form>

  <?

if (isset($_GET['tile'])) {
    switch ($_GET['tile']) {
        case 'users':
            users();
            break;
        case 'verifyWallpapers':
            verifyWallpapers();
            break;
    }
}
// display users:
function users() {
    $result= mysqli_query($conn, "SELECT * FROM `user`");
    if(mysqli_num_rows($result)>0){
        echo "<form action=\"deleteUser.php\" method=\"POST\">";
        while($row = mysqli_fetch_array($result)){
            $id= $row['id_user'];
            $user= $row['username'];
            $v= $row['verified'];
            echo"
            <p>Username: {$user}</p>
            <p>Verification: ". $v ? "Is Verified":"Isn't Verified"."</p>
            <input type=\"submit\" class=\"button\" name=\"{$id}\" value=\"Delete\"><hr>";
        }
    }
    exit;
}
//display unverified wallpapers:
function verifyWallpapers() {
    $result= mysqli_query($conn, "SELECT 'id_wallpaper','title','desktop' FROM `wallpaper` WHERE `verified` = 0");
    if(mysqli_num_rows($result)>0){
        echo "<div class=\"container\"><div class=\"row\">";
        echo "<form action=\"updateWP.php\" method=\"POST\">";
        while($row = mysqli_fetch_array($result)){
            $id= $row['id_wallpaper'];
            $title= $row['title'];
            $file= $row['desktop'];

            echo"
            <div class=\"col-4 border text-center\"><img class=\"img-fluid img-thumbnail\" src=\"./destination/$file\" alt=\"$name\">
            <input type=\"submit\" class=\"button\" name=\"{$id}V\" value=\"Verify\">
            <input type=\"submit\" class=\"button\" name=\"{$id}\" value=\"Delete\">
            </div>
            <hr>";
        }
        echo "</div></div>";
    }
    exit;
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
