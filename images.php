<?php
//include "includes\db_config.php";

    if(isset($_GET['search'])){
        // $search = $_GET['search'];
        $search = trim(strtolower($_GET['search']));
        //var_dump($search);
        $result= mysqli_query($conn, "SELECT * FROM `wallpaper` WHERE `tags` = '$search'");
        //var_dump($result);
        if(mysqli_num_rows($result)>0){
            
            echo "<div class=\"container\"><div class=\"row\">";
    while($row = mysqli_fetch_array($result)){
    
    $loc = $row['desktop'];
    $name= $row['title'];
            echo "<div class=\"col-4 border text-center\"><img class=\"img-fluid img-thumbnail\" src=\"./destination/$loc\" alt=\"$name\">
            <a href=\"download.php?file=$loc\">download $name</a></div>";
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