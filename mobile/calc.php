<?php
$user= $_SESSION['id_user'];
$sql="SELECT * from wallpaper where id_user = '$user'";
$result= mysqli_query($conn,$sql);
$unique= $total= 0;
foreach( $result as $value){
    $unique+=$value['unique_downloads'];
    $total+=$value['downloads'];
}
$earn= $unique/20;
$username= $_SESSION['username'];
echo '<h1>'.$username.'</h1><br><h3>Earnings</h3><br><p>'.$earn.'$</p><br><h3>Total Downloads</h3><p>'.$total.'<br><h3>Unique Downloads:</h3><br><p>'.$unique.'</p><br><br><a href="./logout.php">logout</a>';