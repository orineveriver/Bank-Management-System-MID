<?php
include("../control/registration_validation.php");
?> 
<!DOCTYPE html>
<html>
    <head>
        <title>Registration</title>
    </head>
    <body>

        <h1>Registration Form</h1>
        <form  action="" method="POST" >


                <label for="type">Registration as:  </label>
                <input type="radio" name="type" id="customer" value="customer">
                <label for="type">Customer</label>
                <input type="radio" name="type" id="vendor" value="vendor">
                <label for="type">Vendor</label>

                <?php echo $typeerr; ?>

            <fieldset>
                <legend><b>Basic Information:</b></legend>
            
                <label for="firstname">First Name:</label>
                <input type="text" name="firstname" id="firstname" value="">
                <br>
                <?php echo $firstnameerr; ?>

                <br>

                <label for="lastname"> Last Name:</label>
                <input type="text" name="lastname" id="lastname" value="">
                <br>
                <?php echo $lastnameerr; ?>

                <br>

                <label for="nid">NID:</label>
                <input type="text" name="nid" id="nid" value="" pattern="[0-9]{13}">
                <br>
                <?php echo $niderr; ?>

                <br>

                <label for="dob"> DOB:</label>
                <input type="date" name="dob" id="dob" value="">
                <br>
                <?php echo $doberr; ?>

                <br>

                <label for="gender">Gender:  </label>
                <input type="radio" name="gender" id="male" value="male">  
                <label for="gender">Male </label>
                <input type="radio" name="gender" id="female" value="female">
                <label for="gender">Female </label>
                <input type="radio" name="gender" id="other" value="other">
                <label for="gender">Other </label>
                <br>
                <?php echo $gendererr; ?>

                <br>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="" placeholder="example@gmail.com">
                <br>
                <?php echo $emailerr; ?>

                <br>

                <label for="phone">Phone no:</label>
                <input type="tel" id="phone" name="phone" value="" pattern="01[0-9]-[0-9]{8}" placeholder="016-1245678">
                <br>
                <?php echo $phoneerr; ?>

                <br>

                <label for="nnid">Nominee NID:</label>
                <input type="text" name="nnid" id="nnid" value="" pattern="[0-9]{13}">
                <br>
                <?php echo $nniderr; ?>

                <br>

            </fieldset>

            <fieldset>
                <legend><b>Account Information:</b></legend>

                <label for="pass">Password:</label>
                <input type="password" name="pass" id="pass">
                <?php echo $passerr; ?>

                <br>

                <label for="cpass">Confirm Password:</label>
                <input type="password" name="cpass" id="cpass">
                <?php echo $cpasserr; ?>                

                <br>
                <?php echo $notavailable; ?> 
                <br>

                <input type="submit" value="Submit" name="button"> 

                </fieldset>

        <div style = "text-align:center;">

            <input type="submit" value="Login" name="button">

        </div>

                
        
    </body>
</html>


