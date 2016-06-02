<?php
$servername = "localhost";
$user = "root";
$passw = "";
$dbname = "user";
$conn = mysqli_connect($servername, $user, $passw, $dbname);
if (!$conn) {
    die("connection failed:" . mysqli_connect_error());
}
//add group
if(isset($_POST["group"])&& filter_input(INPUT_POST, "xaction")=="addnewgroup" ){
    $group = $_POST["group"];
    $teszt = "SELECT name FROM groups";
    $tesztq= mysqli_query($conn, $teszt);
    $ok=1;
    while($array=mysqli_fetch_array($tesztq)){
        if($array["name"]==$group){
            $ok=0;
        }
    }
    if ($ok) {
        $ins = "INSERT INTO groups(name) VALUES ('$group')";
        $add = mysqli_query($conn, $ins);
        $sqli = "SELECT id FROM groups WHERE name='$group'";
        $queryy = mysqli_query($conn,$sqli);
        while( $valami = mysqli_fetch_array($queryy)){
//            print_r($valami);
            ?>
            <input type="checkbox" name="group[]" value="<?php echo $valami["id"]; ?>">
            <label><?php echo $group; ?></label><br>
            <?php
        }
    }
}
//listgroups
else{
    $sql = "SELECT id,name FROM groups";
    $query = mysqli_query($conn, $sql);
    foreach ($query as $val) {
        ?>
        <input type="checkbox" name="group[]" value="<?php echo $val["id"]; ?>">
        <label><?php echo $val["name"]; ?></label><br>
        <?php
    }
}

