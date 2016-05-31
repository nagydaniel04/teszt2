<!DOCTYPE html>
<html>
    <head> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script>
            $(document).ready(function () {
                $("#country").click(function () {
                    $.ajax({
                        url: "find_counties.php",
                        method: "POST",
                        data: {id: $("#country").val()}
                    }).success(function (result) {
                        $("#county").html(result);
                    });
                });
            });
        </script>
        <!--  js valdation -->
        <script>
            $(document).ready(function () {
                $(".form").submit(function (event) {
                    //nev
                    var name = $("#name").val();
                    //alert(name);
                    var resn = name.match(/[A-Z][a-z]+ [A-Z][a-z]+/g);
                    //alert(res);
                    if (!resn) {
                        event.preventDefault();
                        alert("nem helyes a nev");
                    } else {
                        //alert("helyes a nev");
                    }
                    //email
                    var email = $("#email").val();
                    //alert(email);
                    var rese = email.match(/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/);
                    //alert(rese);
                    if (!rese) {
                        event.preventDefault();
                        alert("nem helyes az email");
                    } else {
                        //alert("helyes az email");
                    }
                    //country
                    if ($("#country").val() == 'default') {
                        event.preventDefault();
                        alert('nincs kivalasztva orszag');
                    } else {
                        //alert('ki van valsztva az orszag');
                    }
                    if ($("#county").val() == 'default') {
                        event.preventDefault();
                        alert('nincs kivalasztva megye');
                    } else {
                        //alert('ki van valsztva a megye');
                    }
                    if ($("#passw").val() == '') {
                        event.preventDefault();
                        alert('nincs jelszo');
                    }
                    if ($("#repassw").val() != $("#passw").val()) {
                        event.preventDefault();
                        alert('nem azonosak a jelszavak');
                    }
                });
            });
        </script>
        <style>
            body{
                background-color: lightgreen;
            }
            .wrap{
                width:100%
            }
            .left{
                background-color: lightblue;
                float:left;
                width:31%;
            }
            .rigth{
                background-color: lightblue;
                float:right;
                width: 68%;
                border-left: 2px solid black;               
            }
            .form-group{
                border: 0px;
            }
            .btn{
                /*float: right;*/
            }
        </style>
    </head>
    <body>
        <?php
        include 'save.php';
        if (isset($oksucces)) {
            echo "Succes";
        }
        if (isset($_GET["id"])) {
            $idu = $_GET["id"];
            //echo $idu;
            $sqlu = "SELECT image,id,name,email,country_id,county_id,password FROM users WHERE id=$idu";
            $queryu = mysqli_query($conn, $sqlu);
            $q = mysqli_fetch_array($queryu);
            $image = $q["image"];
            if($image==NULL){
                $image="teszt2.jpg";
            }
            $name = $q["name"];
            $email = $q["email"];
            $country_id = $q["country_id"];
            $okcountry = 1;
            $county_id = $q["county_id"];
            $okcounty = 1;
            $password = $q["password"];
        }
        ?>
        <form method="POST" action="index.php" class="form" enctype="multipart/form-data"> 
            <div class="wrap">
                <div class="left">
                    <fieldset class="form-group">
                        <label> Image: </label>
                        <input type="file" name="fileToUpload" id="fileToUpload" >
                        <img style="width: 150px; height: 150px;" src="<?php if (isset($image)&&!$image) {
                        echo $image;}
                        else{  
                            echo "teszt2.jpg";
                        } ?> ">
                    </fieldset>
                </div>
                <div class="rigth">
                    <fieldset class="form-group">
                        <label> Name: </label>
                        <?php if (true): ?>
                            <input type="text" value="<?php if (isset($name)) echo $name; ?>" name="name" id="name" ><br>
                        <?php endif; ?>
                    </fieldset>
                    <fieldset class="form-group">
                        <label> Email: </label>
                        <?php if (true): ?>
                            <input type="text" name="email" value="<?php if (isset($email)) echo $email; ?>" id="email" ><br>
                        <?php endif; ?>
                    </fieldset>
                    <fieldset class="form-group">
                        <label> Country: </label>
                        <select name="country" id="country">
                            <option value="default">Choose a Country...</option>
                            <?php include 'find_countries.php'; ?>
                        </select><br>
                    </fieldset>
                    <fieldset class="form-group">
                        <label> County: </label>
                        <select id="county" name="county">
                            <?php if (isset($okcounty)) include 'find_counties.php'; ?>
                        </select><br>
                    </fieldset>
                    <fieldset class="form-group">
                        <label> Password: </label>
                        <?php if (true): ?>
                            <input type="password" name="password" value="<?php if (isset($password)) echo $password; ?>" id="passw" ><br>
                        <?php endif; ?>
                    </fieldset>
                    <fieldset class="form-group">
                        <label> Password again: </label> 
                        <?php if (true): ?>
                            <input type="password" name="repassword" value="<?php if (isset($password)) echo $password; ?>" id="repassw" ><br>
                        <?php endif; ?>
                        <?php include 'pass.php'; ?>
                    </fieldset>
                    <fieldset class="form-group">
                        <h4>Csoportok,melyeknek tagja szeretnek lenni:</h4>
                        <input type="checkbox" name="group[]" value="3">
                        <label>Vasarhelyiek</label>
                        <br>
                        <input type="checkbox" name="group[]" value="4">
                         <label>Tudor City</label>
                        <br> 
                        <input type="checkbox" name="group[]" value="5">
                        <label>Bolyaisok</label>
                        <br>
                        
                        
                    </fieldset>
                    <fieldset class="form-group">
                        <input class="btn" type="submit" name="submit" value="Submit"><br>
                    </fieldset>
                    <a href="index.php">New account</a><br>
                    <a href="users.php">All users</a>
                </div>
            </div>
        </form>
    </body>
</html>