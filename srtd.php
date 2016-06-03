<?php
function singlerow($connect,$emailaddress,$groupid){
    $sql="SELECT email FROM ug WHERE email='$emailaddress' && gid='$groupid' ";
    $query=mysqli_query($connect, $sql);
    foreach ($query as $val){
        if($val){
            return 1;//ha benne van
        }
        else{
            return 0;//ha nincs benne
        }
    }
}