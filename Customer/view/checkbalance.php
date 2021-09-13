<?php
include("../control/checkbalance_validation.php");
?> 
<!DOCTYPE html>
<html>
    <head>
        <title>Balance</title>
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
                <legend><b>Balance:</b></legend>
            
                Balance: <?php echo $balance; ?>

            </fieldset>

    </body>
</html>


