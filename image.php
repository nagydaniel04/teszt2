<?php

function image() {
    
    if (isset($_POST["submit"])&& $_FILES["fileToUpload"]["name"]) {
        $target_dir = "C:/xampp/htdocs/teszt2/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
        $tmp_name=$_FILES["fileToUpload"]["tmp_name"];
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);        
        //var_dump($_FILES["fileToUpload"]["name"]);
        $imagev = $_FILES["fileToUpload"]["name"];
        move_uploaded_file($tmp_name, $target_file);
        if ($check !== false) {
            //echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        }
        else {
            echo "File is not an image.";
            $uploadOk = 0;
            $imagev = "teszt2.jpg";
        }
    }
    else{ 
        $imagev = "teszt2.jpg";
    }
    return $imagev;
}
