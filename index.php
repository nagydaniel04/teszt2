<html>
    <head>   
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
            if(isset($oksucces)){
                echo "Succes";
            }
        ?>
        <form> 
        <div class="wrap">
            <div class="left">
                <fieldset class="form-group">
                    <label> Image: </label>
                    <input type="file" name="image" name="" id="camerainput1" accept="image/*" capture="camera"><br>
                </fieldset>
            </div>
            <div class="rigth">
                <fieldset class="form-group">
                    <label> Name: </label>
                    <?php if(true): ?>
                    <input type="text" name="<?php if(isset($name))echo $name; ?>" id="name" ><br>
                    <?php endif; ?>
                </fieldset>
                <fieldset class="form-group">
                    <label> Email: </label>
                    <?php if(true): ?>
                    <input type="text" name="<?php if(isset($name))echo $name; ?>" id="email" ><br>
                    <?php endif; ?>
                </fieldset>
                <fieldset class="form-group">
                    <label> Country: </label>
                    <select>
                        <option value="default">Choose a Country...</option>
                    </select><br>
                </fieldset>
                <fieldset class="form-group">
                     <label> County: </label>
                    <select>
                        <option value="default">Choose a County</option>
                    </select><br>
                </fieldset>
                <fieldset class="form-group">
                    <label> Password: </label>
                    <input type="password" ><br>
                </fieldset>
                <fieldset class="form-group">
                    <label> Password again: </label>                  
                    <input type="password" ><br>
                </fieldset>
                <fieldset class="form-group">
                    <input type="button" value="Submit" name="submit" class="submit"><br>
                </fieldset>
            </div>
        </div>
        </form>
    </body>
</html>

