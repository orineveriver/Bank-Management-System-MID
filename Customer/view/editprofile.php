<?php
include("../control/editprofile_validation.php");
?> 
<!DOCTYPE html>
<html>
    <head>
        <title>Edit Profile</title>
    </head>
    <body>

        <a href="../view/dashboard.php">Dashboard</a><br>
        <a href="../view/profile.php">Profile</a><br>
        <a href="../view/checkbalance.php">Check Balance</a><br>
        <a href="../view/moneytransfer.php">Money Transfer</a><br>
        <a href="../view/transactionhistory.php">Transaction History</a><br>
        <a href="../view/changepassword.php">Change Password</a><br>
        <a href="../control/logout_validation.php">logout</a><br>

        <form  action="" method="POST" >

            <fieldset>
                <legend><b>Basic Information:</b></legend>
            
                <label for="firstname">First Name:</label>
                <input type="text" name="firstname" id="firstname" value="<?php echo $firstname; ?>">
                <br>
                <?php echo $firstnameerr; ?>

                <br>

                <label for="lastname"> Last Name:</label>
                <input type="text" name="lastname" id="lastname" value="<?php echo $lastname;?>">
                <br>
                <?php echo $lastnameerr;?>

                <br>

                <label for="phone">Phone no:</label>
                <input type="tel" id="phone" name="phone" pattern="01[0-9]-[0-9]{8}" placeholder="016-1245678" value="<?php echo $phone; ?>">
                <br>
                <?php echo $phoneerr; ?>

                <br>

                <label for="nnid">Nominee NID:</label>
                <input type="text" name="nnid" id="nnid" value="<?php echo $nnid; ?>" pattern="[0-9]{13}">
                <br>
                <?php echo $nniderr; ?>

                <br>

                <input type="submit" value="Save" name="button"> 

                </fieldset>

                
        
    </body>
</html>


