<?php
$servername = "localhost";
$user = "root";
$passw = "";
$dbname = "user";
$conn = mysqli_connect($servername, $user, $passw, $dbname);
if (!$conn) {
    die("connection failed:" . mysqli_connect_error());
}
$sql = "SELECT id,name FROM groups";
$query =  mysqli_query($conn, $sql);
 foreach($query as $val){
    ?>
        <input type="checkbox" value="<?php echo $val["id"];?>">
        <label><?php echo $val["name"]; ?></label><br>
    <?php
 }

