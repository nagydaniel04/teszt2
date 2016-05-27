<?php
function find_county() {
    $sql = "SELECT name, id FROM counties WHERE country_id=$cid";
    $result = mysqli_query($conn, $sql);
?>
    <option value="default">Choose a county...</option>
<?php
    while ($row = mysqli_fetch_array($result)) {
        if (isset($GLOBALS['okcounty']) && $row[id] = $GLOBALS['county_id']) {
            echo'<option value=' . $row["id"] . ' selected >' . $row["name"] . '</option>';
        } else {
            echo'<option value=' . $row["id"] . '>' . $row["name"] . '</option>';
        }
    }
}
