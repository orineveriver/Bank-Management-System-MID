<?php
include("../control/changepassword_validation.php");
?> 
<!DOCTYPE html>
<html>
    <head>
        <title>Change Paswword</title>
    </head>
    <body>

    <a href="../view/dashboard.php">Dashboard</a><br>
        <a href="../view/profile.php">Profile</a><br>
        <a href="../view/withdraw.php">Withdraw</a><br>
        <a href="../view/deposit.php">Deposit</a><br>
        <a href="../view/customerlist.php">Customers List</a><br>        
        <a href="../view/customer.php">Account</a><br>
        <a href="../view/changepassword.php">Change Password</a><br>
        <a href="../control/logout_validation.php">logout</a><br>
        
        <h3>Change Password!</h3>
        <form  action="" method="POST">
            <label>Hello <?php echo $firstname ?> <?php echo $lastname ?>, Enter Your new Password! </label> <br>

            <label for="password">Password:</label>
            <input type="password" name="pass" id="password">

            <br>

            <label for="cpassword">Confirm Password:</label>
            <input type="password" name="cpass" id="cpassword">

            <?php echo $passerr; ?>
            <br>
            <?php echo $emptyerr; ?>
            <br>

            <input type="submit" value="Change Password" name="button"> 
            
        </form>

        <br>
         
    </body>
</html>