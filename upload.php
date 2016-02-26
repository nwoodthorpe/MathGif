<?php
    //INCREMENT COUNTER
    $image = $_POST["gif"];
    $idFile = fopen("id.id", 'r+');
    $id = (int) fread($idFile, filesize("id.id"));
    file_put_contents("id.id",$id + 1);
    fclose($idFile);
    
    //CREATE FILE
    $gif = fopen(($id + 1) . ".gif", "wb"); 
    $image = substr($image, 22);

    $image = str_replace(" ", "+", $image);

    fwrite($gif, base64_decode($image));
    echo ($id + 1) . ".gif";
?>