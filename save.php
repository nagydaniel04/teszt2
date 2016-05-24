<?php
$servername = "localhost";
$user = "root";
$passw = "";
$dbname = "user";
$conn = mysqli_connect($servername, $user, $passw, $dbname);
if (!$conn) {
    die("connection failed:" . mysqli_connect_error());
}
$name=$_POST["name"];
$email=$_POST["email"];
$country_id=$_POST["country"];
$county_id=$_POST["county"];
$password=$_POST["password"];
$insert="INSERT INTO users(name,email,country_id,county_id,password)"
        . "VALUES ('$name','$email','$country_id','$county_id','$password')";
$sql=mysqli_query($conn, $insert);
if($sql){
    $oksucces=1;
}


