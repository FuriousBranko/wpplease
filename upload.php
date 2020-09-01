<?php
session_start();
require "./includes/db_config.php";
require "./watermark.php";

    if(isset($_POST['submit'])
    ){
        $tagsSend= "";
        $file1 = $file2 = $file3 = "nothing";
        //1440
        // $file1 = $_FILES['2160'];                            
        // $file1name= $file1['name'];
        // $file1size= $file1['size'];
        //1080
        $file2 = $_FILES['1080'];
        $file2name= $file2['name'];
        $file2size= $file2['size'];
        $file2error= $file2['error'];
        $file2tmplocation= $file2['tmp_name'];
        //720
        // $file3 = $_FILES['720'];
        // $file3name= $file3['name'];
        // $file3size= $file3['size'];

        $title= mysqli_real_escape_string($conn,ucfirst(strtolower($_POST['title'])));
        $tags= $_POST['tags-outside'];
        //var_dump (json_decode($tags,1));
        $tags= json_decode($tags,1);
        var_dump($tags);
       $count  = count($tags);
        //var_dump($tags);
        for($i = 0;$i<$count;$i++){
            var_dump($tags);
            $tags= implode(" ", $tags[$i]);
        }
        
        $fileEXT= explode('.',$file2name);
        $fileactEXT= strtolower(end($fileEXT));
        $allowed= array('jpg','jpeg','png');
        if(in_array($fileactEXT, $allowed)){
            if($file2error === 0){
                $file2namenew= uniqid('',true).".".$fileactEXT;
                $file2dest= "./images/".$file2namenew;
                move_uploaded_file($file2tmplocation,$file2dest);
                //$id_user = $_SESSION('id_user');
                $sql= "INSERT INTO wallpaper (id_user, title, desktop, tags) values ( 9, '$title', '$file2namenew', '$tags')";
                $result= mysqli_query($conn,$sql);
                watermark($file2namenew, $fileactEXT);
                //header("Location: index.php");
            }else{
                echo "error with file";
            }

        }else{
            echo "wrong image format";
        }
        // var_dump($file1);
        // var_dump($title);echo "<br>";
        // var_dump($tags);
    }
    else{
        echo "wrong";
    }
?>