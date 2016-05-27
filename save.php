<?php
include 'image.php';
$servername = "localhost";
$user = "root";
$passw = "";
$dbname = "user";
$conn = mysqli_connect($servername, $user, $passw, $dbname);
if (!$conn) {
    die("connection failed:" . mysqli_connect_error());
}
if ($_POST) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $country_id = $_POST["country"];
    $county_id = $_POST["county"];
    $password = $_POST["password"];
    $repass=$_POST["repassword"];
    $isname = "/^[A-Z][a-z]+ [A-Z][a-z]+$/";
    $okname = 1;
    $okmail = 1;
    $okcountry = 1;
    $okcounty = 1;
    $okpass=1;
    $okrepass=1;
    if (empty($name) || !preg_match($isname, $name) || strlen($name) > 30) {
        //echo 'Incorrect name<br>';
        $okname = 0;
    }
    if (empty($email) || strlen($email) > 30 || (filter_var($email, FILTER_VALIDATE_EMAIL) === false)) {
        $okmail = 0;
    }
    if ($country_id == 'default') {
        $okcountry = 0;
    }
    if ($county_id == 'default') {
        $okcounty = 0;
    }    
    if(empty($password)){
        $okpass=0;
    }
    if($password!=$repass){
        $okrepass=0;
    }
    $image=image();
    if ($okname && $okmail && $okcountry && $okcounty && $okpass && $okrepass) {
        $insert = "INSERT INTO users(image,name,email,country_id,county_id,password)"
                . "VALUES ('$image','$name','$email','$country_id','$county_id','$password')";
        if (mysqli_query($conn, $insert)){
            $oksucces = 1;
        }
    }
}


