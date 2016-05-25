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
                        <input type="password" name="password"><br>
                    </fieldset>
                    <fieldset class="form-group">
                        <label> Password again: </label>                  
                        <input type="password" name="repassword"><br>
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