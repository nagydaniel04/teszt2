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
    $idu=$_POST["hidden"];
    $lastimage=$_POST["lastimage"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $country_id = $_POST["country"];
    $county_id = $_POST["county"];
    $password = $_POST["password"];
    $repass = $_POST["repassword"];
    $isname = "/^[A-Z][a-z]+ [A-Z][a-z]+$/";
    $okname = 1;
    $okmail = 1;
    $okcountry = 1;
    $okcounty = 1;
    $okpass = 1;
    $okrepass = 1;
    if (empty($name) || !preg_match($isname, $name) || strlen($name) > 30) {
        //echo 'Incorrect name<br>';
        $okname = 0;
    }
    if (empty($email) || strlen($email) > 30 || (filter_var($email, FILTER_VALIDATE_EMAIL) === false) /*|| !$okemail*/) {
        $okmail = 0;
    }
    if ($country_id == 'default') {
        $okcountry = 0;
    }
    if ($county_id == 'default') {
        $okcounty = 0;
    }
    if (empty($password)) {
        $okpass = 0;
    }
    if ($password != $repass) {
        $okrepass = 0;
    }    
    $image = image();
    if(!$image){
        $image = $lastimage;        
    }
    if(isset($_POST['group'])){
        $gid=$_POST['group'];        
    }
    else{
        //echo 'nincs kivalasztva semmi';
        $gid=array();
    }
    //email unique+$okemail in if, before the insert 
    $okemail=1;
    $query="SELECT email FROM users";
    $sql=mysqli_query($conn,$query);
    while ($value=mysqli_fetch_array($sql)){
        if($value["email"]==$email){    
            $okemail=0;
            break;
        }
    }    
    if($okemail==0){
        if(isset($idu)){
            $update="UPDATE users SET image='$image',name='$name',email='$email',country_id='$country_id',county_id='$county_id',password='$password' WHERE id='$idu'";
            $updatequery=mysqli_query($conn, $update);
        }
        else{
            echo 'Van ilyen emailcim  mar az adatbazisban';
        }
    }
    //add group
    $group=$_POST["addgroup"];
    $ins="INSERT INTO groups(name) VALUES ('$group')";
    $add=mysqli_query($conn, $ins);
    var_dump($ins);
    //add 
    if ($okname && $okmail && $okcountry && $okcounty && $okpass && $okrepass && $okemail) {
        $insert = "INSERT INTO users(image,name,email,country_id,county_id,password)"
                . "VALUES ('$image','$name','$email','$country_id','$county_id','$password')";
        foreach($gid as $val){
            $insertug="INSERT INTO ug(email,gid) VALUES ('$email','$val')";
            $q=mysqli_query($conn, $insertug);
        }
        if (mysqli_query($conn, $insert)) {
            
            $oksucces = 1;
        }
    }
}


