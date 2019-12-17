<?php
include "includes\db_config.php";

    if(isset($_GET['search'])){

        $search = $_GET['search'];

        $result= mysqli_query($conn, "SELECT * FROM wallpaper WHERE tags LIKE '%{$search}%'");
    
        if(mysqli_num_rows($result)>0){
            
            echo "<div class=\"container\"><div class=\"row\">";
    while($row = mysqli_fetch_array($result)){
    print_r($row);
    $loc = $row['desktop'];
    $name= $row['title'];
            echo "<div class=\"col-4\"><img class=\"image-fluid\" src=\"./destination/$loc\" alt=\"$name\"></div>";
        }
    
    echo "</div></div>";
    }
    else{
        echo "0 results found";
    }
}
    ?>