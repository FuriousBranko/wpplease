<?php
// session_start();
// include_once "./db_config.php";
$user= $_SESSION['id_user'];
$sql="SELECT * from wallpaper where id_user = '$user'";
$result= mysqli_query($conn,$sql);
$username= $_SESSION['username'];
$sql2 = "SELECT * FROM user WHERE username = '$username'";
$result2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
$unique= $total= 0;
foreach( $result as $value){
    $unique+=$value['unique_downloads'];
    $total+=$value['downloads'];
}
$earn= $unique/20;
// var_dump($result2);
$a = $result2;
$ATMearn = $earn - $a;
// echo '<h1>'.$username.'</h1><h3>Earnings</h3><p>$'.$earn.'</p><h3>Total Downloads</h3><p>'.$total.'<br><h3>Unique Downloads</h3><p>'.$unique.'</p><hr>';
  echo"      <div class=\"col-md-12\">
            <div class=\"section-heading\">
              <span>WPP Wallet</span>
              <h2>$username</h2>
              <p>Total downloads: $total</p>
              <p>Total unique downloads: $unique</p>
              <h4> Earnings </h4>
              <p>$$ATMearn</p>
              <form action=\"cashout.php\" method=\"GET\">
              <button type=\"submit\" name=\"earnings\" id=\"yes\" class=\"main-button\" value=\"$ATMearn\">Cash out</button>
              </form>
              <br><a class=\"logout\" href=\"./logout.php\">logout</a>
              <h2>Your Wallpapers</h2>
            </div>
          </div>";
foreach($result as $value){
    // echo '<h3>'.$value['title'].'</h3><p>Downloads: '.$value['downloads'].'</p><p>Unique Downloads: '.$value['unique_downloads'].'</p><p>Earnings: $'.$value['unique_downloads']/20 .'</p>';
echo "
        <div class=\"col-md-6\">
            <div class=\"feature-item\">
              <div class=\"icon\">
                <img src=\"assets/images/feature-01.png\" alt=\"\">
              </div>
              <h4>{$value['title']}</h4>
              <h5>DOWNLOADS</h5>
              <p>{$value['unique_downloads']}</p>
              <p>Earned: ";
              echo $value['unique_downloads']/20;
              echo "</p>
            </div>
        </div>";
}
