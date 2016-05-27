<?php
$servername = "localhost";
$user = "root";
$passw = "";
$dbname = "user";
$conn = mysqli_connect($servername, $user, $passw, $dbname);
if (!$conn) {
    die("connection failed:" . mysqli_connect_error());
}
$sql = "SELECT * FROM countries";
$query = mysqli_query($conn, $sql);
foreach ($query as $value) {
    if (isset($okcountry) && $value[id] == $country_id) {
        ?><option selected value="<?php echo $value["id"] ?>"><?php echo $value["name"] ?></option><?php
    } else {
        ?><option value="<?php echo $value["id"] ?>"><?php echo $value["name"] ?></option><?php
    }
}


