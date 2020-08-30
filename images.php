<?php
// include "includes\db_config.php";

    if(isset($_GET['search'])){
        // $search = $_GET['search'];
        $search = trim(strtolower($_GET['search']));
        //var_dump($search);
        //$result= mysqli_query($conn, "SELECT * FROM `wallpaper` WHERE `tags` = '$search'"); exact
        $result= mysqli_query($conn, "SELECT * FROM `wallpaper` WHERE `tags` LIKE '$search'");//similar
        //var_dump($result);
        if(mysqli_num_rows($result)>0){
            
            echo "<div class=\"container\"><div class=\"row\">";
    while($row = mysqli_fetch_array($result)){
    
        $loc = $row['desktop'];
        $name= $row['title'];
        // $v = $row['verified'];
        if ($row['verified']){
            echo "<div class=\"col-4 border text-center\"><img class=\"img-fluid img-thumbnail\" src=\"./destination/$loc\" alt=\"$name\">";
            if (isset($_SESSION['id_user']) && $_SESSION['sub'] == 1) {
                echo "<a href=\"download.php?file=$loc\" class=\"track_click\" data-user-id=".$_SESSION['id_user']." data-wallpaper-id=".$row['id_wallpaper'].">download $name</a>";
            }
            echo "</div>";
        }
        }
    
    echo "</div></div>";
    }
    else{
        echo "<div class=\"container\"><div class=\"row\">";
        echo "<div class=\"col-12 text-center\"<p>0 results found</p></div>";
        echo "</div></div>"; 
    }
}
    ?>