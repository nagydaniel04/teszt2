<?php
if (isset($_POST["submit"])) {
    $target_dir = "C:/xampp/htdocs/teszt2";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
        ?>
        <img style="width: 150px; height: 150px;" src="<?php echo $_FILES["name"]; ?> ">
        <?php
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
        ?>
        <img style="width: 150px; height: 150px;" src="teszt2.jpg">
        <?php
    }
}