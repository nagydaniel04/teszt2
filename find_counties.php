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
?>
<option value="default">Choose a county...</option>
<?php
while ($row = mysqli_fetch_array($result)) {
    if(isset($okcounty)&&$row[id]=$county_id){
        echo'<option value=' . $row["id"] . ' selected >' . $row["name"] . '</option>';
    }
    else {
        echo'<option value=' . $row["id"] . '>' . $row["name"] . '</option>';
    }
}
