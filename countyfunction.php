<?php

function find_county($cid, $okcounty, $county_id) {
    $sql = "SELECT name FROM counties WHERE country_id=$cid";
    $result = mysqli_query($conn, $sql);
    ?>
    <option value="default">Choose a county...</option>
    <?php
    while ($row = mysqli_fetch_array($result)) {
        if (isset($okcounty) && $row[id] = $county_id) {
            echo'<option value=' . $row["id"] . ' selected >' . $row["name"] . '</option>';
        } else {
            echo'<option value=' . $row["id"] . '>' . $row["name"] . '</option>';
        }
    }
}
