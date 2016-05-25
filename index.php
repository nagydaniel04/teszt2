<!DOCTYPE html>
<html>
    <head> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script>
            $(document).ready(function () {
                $("#country").change(function () {
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
            $(document).ready(function(){
                $(".form").submit(function(event){
                    //nev
                    var name=$("#name").val();
                    //alert(name);
                    var resn=name.match(/[A-Z][a-z]+ [A-Z][a-z]+/g);
                    //alert(res);
                    if(!resn){
                        event.preventDefault();
                        alert("nem helyes a nev");
                    }
                    else{
                        //alert("helyes a nev");
                    }
                    //email
                    var email=$("#email").val();
                    //alert(email);
                    var rese=email.match(/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/);
                    //alert(rese);
                    if(!rese){
                        event.preventDefault();
                        alert("nem helyes az email");
                    }
                    else{
                        //alert("helyes az email");
                    }
                    //country
                    if($("#country").val()=='default'){
                        event.preventDefault();
                        alert('nincs kivalasztva orszag');
                    }
                    else{
                        //alert('ki van valsztva az orszag');
                    }
                    if($("#county").val()=='default'){
                        event.preventDefault();
                        alert('nincs kivalasztva megye');
                    }
                    else{
                        //alert('ki van valsztva a megye');
                    }
                    if($("#passw").val()==''){
                        event.preventDefault();
                        alert('nincs jelszo');
                    }
                    if($("#repassw").val()!=$("#passw").val()){
                        event.preventDefault();
                        alert('nem azonosak a jelszavak');
                    }
                });
            });
        </script>
        <style>
            .wrap{
                width:100%
            }
            .left{
                float:left;
                width:28%;
            }
            .rigth{
                float:right;
                width: 68%;
                border-left: 2px solid black;               
            }
            .form-group{
                border: 0px;
            }
        </style>
    </head>
    <body>
        <?php
        include 'save.php';
        if (isset($oksucces)) {
            echo "Succes";
        }
        ?>
        <form method="POST" action="index.php" class="form"> 
            <div class="wrap">
                <div class="left">
                    <fieldset class="form-group">
                        <label> Image: </label>                        
                        <input type="file"><br>
                        <?php // if(true):?>
                        <!--<img src="teszt2.jpg" style="width:304px;height:228px;">-->
                        <?php // endif; ?>
                        
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
                            <option value="default">Choose a County</option>
                        </select><br>
                    </fieldset>
                    <fieldset class="form-group">
                        <label> Password: </label>
                        <input type="password" name="password" id="passw"><br>
                    </fieldset>
                    <fieldset class="form-group">
                        <label> Password again: </label>                  
                        <input type="password" name="repassword" id="repassw"><br>
                        <?php include 'pass.php'; ?>
                    </fieldset>
                    <fieldset class="form-group">
                        <input class="btn" type="submit" name="submit" value="Submit"><br>
                    </fieldset>
                </div>
            </div>
        </form>
    </body>
</html>