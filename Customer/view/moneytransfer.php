<?php
include("../control/moneytransfer_validation.php");
?> 
<!DOCTYPE html>
<html>
    <head>
        <title>Money Transfer</title>
    </head>
    <body>

        <a href="../view/dashboard.php">Dashboard</a><br>
        <a href="../view/profile.php">Profile</a><br>
        <a href="../view/checkbalance.php">Check Balance</a><br>
        <a href="../view/moneytransfer.php">Money Transfer</a><br>
        <a href="../view/transactionhistory.php">Transaction History</a><br>
        <a href="../view/changepassword.php">Change Password</a><br>
        <a href="../control/logout_validation.php">logout</a><br>
        
    <fieldset>
        <legend><b>Money Transfer:</b></legend>
        <form  action="" method="POST">

            <label for="amount">amount:</label>
            <input type="text" name="amount" id="amount">

            <br>

            <label for="sender">Sender Account:</label>
            <input type="text" name="sender" id="sender">

            <br>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password">

            <br>

            <?php echo $error; ?>
            <br>

            <input type="submit" value="Send" name="button"> 
        </form>
    </fieldset>         
    </body>
</html>