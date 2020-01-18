<?php
require "/includes/db_config.php";
    if(isset($_POST['submit'])){
        $file1 = $file2 = $file3 = "nothing";
        //1440
        $file1 = $_FILES['1440'];
        $file1name= $file1['name'];
        $file1size= $file1['size'];
        //1080
        $file2 = $_FILES['1080'];
        $file2name= $file2['name'];
        $file2size= $file2['size'];
        //720
        $file3 = $_FILES['720'];
        $file3name= $file3['name'];
        $file3size= $file3['size'];

        $title= mysqli_real_escape_string($conn,ucfirst(strlower($_POST['title'])));
        $tags= 0;
    }
?>