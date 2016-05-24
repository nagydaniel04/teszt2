<?php
        $servername="localhost";
        $user="root";
        $passw="";
        $dbname="user";
        
        $conn=mysqli_connect($servername, $user, $passw, $dbname);
        //echo $_POST["name"];
        if (!$conn){
            die("connection failed:".mysqli_connect_error());
        }
        else echo "csatlakozott"
?>
