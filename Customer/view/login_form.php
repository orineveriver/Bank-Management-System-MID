<?php
include("../control/login_validation.php");
?> 
<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
    </head>
    <body>
    <div style= "text-align:center";>
        <h1>Welcome to Troy Bank LTD</h1>
        <form  action="" method="POST">

            <fieldset>
                <legend><b>Login</b></legend>
            
                <label for="username">Username:</label>
                <input type="text" name="username" id="username">
                <br>
                <?php echo $usernameerr; ?>

                <br>

                <label for="password">Password:</label>
                <input type="password" name="password" id="password">
                <br>
                <?php echo $passworderr; ?>

                <br>

                <input type="submit" value="Login" name="button"> 
                
                </fieldset>

                <?php echo $loginfail; ?>

                <br>
                
            
        </form>

        <br>

        <P>Haven't any Account?</p>
        <P>Create Your Account free!</p>
        <P>Click Here</p>

        <form action="../view/registration_form.php" method="POST">
            <input type="submit" value="SIGN UP" name="button">
        </form>

    </div>

    </body>
</html>