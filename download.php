<?php
    if(isset($_GET['file'])) {
        $file = $_GET['file'];
        $filepath = "images/" . $file ;
        if(file_exists($filepath)){
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
            // header('Expires: 0');
            // header('Cache-Control: must-revalidate');
            // header('Pragma: public');
            // header('Content-Lenght: '. filesize($filepath));
            flush();
            readfile($filepath);
            exit;
        }
    }
?>