<?php 
    include('./includes/db_config.php');
    session_start();
    if(!isset($_SESSION['id_user'])){
        header("Location: index.php");
    }else{
        $us= $_SESSION['id_user'];
    }
    if(isset($_POST['sub'])){
        $amm= $_POST['sub'];
        $exp= strtotime('+'.$amm.' month',time());
        $sql= "INSERT INTO subscription ( id_user, duration, expiration) values ( '$us', '$amm', '$exp')";
      $result= mysqli_query($conn, $sql);
      var_dump($result);
    }
    ?>
    <div class="container" style="display: grid; grid-template-colums: 1tr 1tr 1tr;">
        <div class="box">
            <h1>1 Month</h1>
            <form action="subs.php" method="POST">
            <button type="submit" name="sub" value="1">Get Now</button>
            </form>
        </div>
        <div class="box">
            <h1>6 Months</h1>
            <form action="subs.php" method="POST">
            <button type="submit" name="sub" value="6">Get Now</button>
            </form>
        </div>
        <div class="box">
            <h1>12 Months</h1>
            <form action="subs.php" method="POST">
            <button type="submit" name="sub" value="12">Get Now</button>
            </form>
        </div>
    </div>
