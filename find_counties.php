<?php
$servername = "localhost";
$user = "root";
$passw = "";
$dbname = "user";
if (isset($_POST["id"])) {
    $cid = $_POST["id"];
} else if ($okcounty) {
    $cid = $country_id;
} else {
    $uid = $_GET["id"];
    $cid = "SELECT county_id FROM users WHERE id=$uid";
}
$conn = mysqli_connect($servername, $user, $passw, $dbname);

if (!$conn) {
    die("connection failed:" . mysqli_connect_error());
}
$sql = "SELECT name, id FROM counties WHERE country_id=$cid";
$result = mysqli_query($conn, $sql);
?>
<option value="default">Choose a county...</option>
<?php
foreach ($result as $value) {
    if (isset($okcounty) && $value["id"] == $county_id) {
        ?><option selected value="<?php echo $value["id"] ?>"><?php echo $value["name"] ?></option><?php
    } else {
        ?><option value="<?php echo $value["id"] ?>"><?php echo $value["name"] ?></option><?php
    }
}
