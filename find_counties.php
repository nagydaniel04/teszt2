<?php

$servername = "localhost";
$user = "root";
$passw = "";
$dbname = "user";
$cid = $_POST["id"];
$conn = mysqli_connect($servername, $user, $passw, $dbname);

if (!$conn) {
    die("connection failed:" . mysqli_connect_error());
}
$sql = "SELECT name, id FROM counties WHERE country_id=$cid";
$result = mysqli_query($conn, $sql);
$i = 0;
while ($row = mysqli_fetch_array($result)) {
    $i+=1;
    echo'<option value=' . $row["id"] . '>' . $row["name"] . '</option>';
}
