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
<!--        <script>
            $(document).ready(function () {
                $("checkbox").mouseover(){
                    
                }
            }
        </script>-->
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
            input.a,select,input.datepicker{
                margin: 8px 0;
                box-sizing: border-box;
                border: 3px solid #ccc;
                -webkit-transition: 0.5s;
                transition: 0.5s;
                outline: none;
                border-radius: 6px;
                /*background-color: blueviolet;*/
            }
            label,h3{
                color:grey;
            }
/*            select{
                margin: 8px 0;
                box-sizing: border-box;
                border: 3px solid #ccc;
                -webkit-transition: 0.5s;
                transition: 0.5s;
                outline: none;
                border-radius: 6px;
            }*/
            input.a:focus {
                border: 3px solid #555;
            }
            input.datepicker:focus {
                border: 3px solid #555;
            }
            select:focus{
                border: 3px solid #555;
            }
            div.country,.county{ 
                width: 150px;
                display: inline-block;
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
                    <input type="hidden" name="hidden" value="<?php if (isset($idu)) echo $idu; ?>">
                    <fieldset class="form-group">
                        <label> Image: </label><br>
                        <input type="file" name="fileToUpload" id="fileToUpload" >
                        <input type="hidden" name="lastimage" value="<?php if (isset($image)&&$image) {
                            echo $image;                        
                        }
                        else if(!isset($image)){  
                            echo "teszt2.jpg";
                        } ?>">
                        <img style="width: 150px; height: 150px;" src="<?php if (isset($image)&&$image) {
                            echo $image;                        
//                        }
//                        else if(!isset($image)){  
//                            echo "teszt2.jpg";
                        } ?> ">
                    </fieldset>
                </div>
                <div class="rigth">
                    <fieldset class="form-group">
                        <label> Name: </label><br>
                        <?php if (true): ?>
                            <input type="text"  class="a" value="<?php if (isset($name)) echo $name; ?>" name="name" id="name" ><br>
                        <?php endif; ?>
                    </fieldset>
                    <fieldset class="form-group">
                        <label> Email: </label><br>
                        <?php if (true): ?>
                            <input type="text" class="a" name="email" value="<?php if (isset($email)) echo $email; ?>" id="email" ><br>
                        <?php endif; ?>
                    </fieldset>
                    <div class="locality">
                        <div class="country">                          
                            <fieldset class="form-group">
                                <label> Country: </label><br>
                                <select name="country" id="country"  class="a" >
                                    <option value="default">Choose a Country...</option>
                                    <?php include 'find_countries.php'; ?>
                                </select>
                            </fieldset>
                        </div>
                        <div class="county">
                            <fieldset class="form-group">
                                <label> County: </label><br>
                                <select id="county" name="county"  class="a" >
                                    <option value="default">Choose a County...</option>
                                    <?php if (isset($okcounty)) include 'find_counties.php'; ?>
                                </select><br>
                            </fieldset>
                        </div>
                    </div>
                    <fieldset class="form-group">
                        <label>Birthday:</label><br>
                        <input type="date" class="datepicker"><br>
                    </fieldset>
                    <fieldset class="form-group">
                        <label> Password: </label><br>
                        <?php if (true): ?>
                            <input type="password"  class="a" name="password" value="<?php if (isset($password)) echo $password; ?>" id="passw" ><br>
                        <?php endif; ?>
                    </fieldset>
                    <fieldset class="form-group">
                        <label> Password again: </label> <br>
                        <?php if (true): ?>
                            <input type="password"  class="a" name="repassword" value="<?php if (isset($password)) echo $password; ?>" id="repassw" ><br>
                        <?php endif; ?>
                        <?php include 'pass.php'; ?>
                    </fieldset>
                    <fieldset class="form-group">
                        <h3>Gropus:</h3>
                        <?php include 'grouplist.php'?>
                        <label>Add group:</label><br>
                        <input type="text" class="a" name="addgroup">
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