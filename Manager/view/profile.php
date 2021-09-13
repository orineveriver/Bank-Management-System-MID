<?php
include("../control/profile_validation.php");
?> 

<!DOCTYPE html>
<html>
    <head>
        <title>Profile</title>
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

        <fieldset>
            <legend><?php echo $type; ?> Profile</legend>
                Name: <?php echo $firstname; ?> <?php echo $lastname; ?> <br>
                Date of Birth: <?php echo $dob; ?><br>
                Gender: <?php echo $gender; ?><br>
                Email: <?php echo $email; ?><br>
                Phone no: <?php echo $phone; ?><br>
                Your NID: <?php echo $nid; ?><br>
                <br><br>
                <a href="../view/editprofile.php">Edit Profile</a><br>
        </fieldset>

    </body>
</html>