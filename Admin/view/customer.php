<?php
include("../control/customer_validation.php");
?> 
<!DOCTYPE html>
<html>
    <head>
        <title>Account</title>
    </head>
    <body>

    <a href="../view/dashboard.php">Dashboard</a><br>
        <a href="../view/deposit.php">Deposit</a><br>
        <a href="../view/withdraw.php">Withdraw</a><br>
        <a href="../view/customerlist.php">Customers List</a><br>        
        <a href="../view/customer.php">Account</a><br>       
        <a href="../view/addmanagercashier.php">Add Manager/Cashier</a><br>   
        <a href="../view/changepassword.php">Change Password</a><br>
        <a href="../control/logout_validation.php">logout</a><br>
        
    <fieldset>
        <legend><b>Acoount:</b></legend>
        <form  action="" method="POST">

            <label for="sender">Account No:</label>
            <input type="text" name="sender" id="sender">

            <br>         

            <?php echo $error; ?>
            <br>

            <input type="submit" value="Search" name="button"> 
        </form>
    </fieldset>       

    <fieldset>
        <legend><b>Information:</b></legend>
        <?php
        if($_SERVER['REQUEST_METHOD'] == "POST" && $_REQUEST['button'] == "Search") {

            $log_file = fopen("../database/registrationtable.txt", "r");                    
            $data = fread($log_file, filesize("../database/registrationtable.txt"));                    
            fclose($log_file);
            
            $data_filter = explode("\n", $data);
            
            for($i = 0; $i< count($data_filter)-1; $i++) {
        
                $json_decode = json_decode($data_filter[$i], true); 

                if($json_decode['accno'] == $_POST['sender']) 
                {
                    echo "Account No: ".$json_decode['accno']."<br>";
                    echo "Name: ".$json_decode['firstname']." ".$json_decode['lastname']."<br>";
                    echo "Gender: ".$json_decode['gender']."<br>";
                    echo "Date of Birth :".$json_decode['dob']."<br>";
                    echo "Phone No :".$json_decode['phone']."<br>";
                    echo "Mail :".$json_decode['email']."<br>";
                    echo "Your NID :".$json_decode['nid']."<br>";
                    echo "Nominee NID :".$json_decode['nnid']."<br>";
                }
            }

            $log_file = fopen("../database/logintable.txt", "r");                    
            $data = fread($log_file, filesize("../database/logintable.txt"));                    
            fclose($log_file);
            
            $data_filter = explode("\n", $data);
            
            for($i = 0; $i< count($data_filter)-1; $i++) {
        
                $json_decode = json_decode($data_filter[$i], true); 

                if($json_decode['username'] == $searchmail) 
                {
                    echo "Status: ".$json_decode['status']."<br>";
                }
            }

            $log_file = fopen("../database/balancetable.txt", "r");                    
            $data = fread($log_file, filesize("../database/balancetable.txt"));                    
            fclose($log_file);
            
            $data_filter = explode("\n", $data);
            
            for($i = 0; $i< count($data_filter)-1; $i++) {
        
                $json_decode = json_decode($data_filter[$i], true); 

                if($json_decode['accno'] == $_POST['sender']) 
                {
                    echo "Balance: ".$json_decode['balance']."<br>";
                }
            }
        }        
        ?>
        
    </fieldset>


    <fieldset>
        <legend><b>Action:</b></legend>
        <form action="" method="post">
            <input type="submit" value="Delete Account" name="button">
            <input type="submit" value="Edit Account" name="button">
        </form>
        
    </fieldset>


    <fieldset>
        <legend><b>Transaction:</b></legend>
        <table style="border: 1px solid black;">
                    <tr style="border: 1px solid black;">
                        <td style="border: 1px solid black;"><b>Serial</b></td>
                        <td style="border: 1px solid black;"><b>Amount</b></td>
                        <td style="border: 1px solid black;"><b>Type</b></td>
                        <td style="border: 1px solid black;"><b>Date</b></td>
                    </tr>
                    <?php
                        $count = "1";

                        $log_file = fopen("../database/transactiontable.txt", "r");                    
                        $data = fread($log_file, filesize("../database/transactiontable.txt"));                    
                        fclose($log_file);
                                    
                        $data_filter = explode("\n", $data);
                        for($i = 0; $i< count($data_filter)-1; $i++) {

                            echo '<tr style="border: 1px solid black;">';                          
                            $json_decode = json_decode($data_filter[$i], true);
                            if($json_decode['receiver'] == $searchmail || $json_decode['sender'] == $searchmail)
                            {
                                echo '<td style="border: 1px solid black;">'.$count.'</td>';
                                echo '<td style="border: 1px solid black;">'.$json_decode['amount'].'</td>';
                                if($json_decode['sender'] == $searchmail){
                                    echo '<td style="border: 1px solid black;">Debit</td>';
                                }
                                else{
                                    echo '<td style="border: 1px solid black;">Credit</td>';
                                }
                                echo '<td style="border: 1px solid black;">'.$json_decode['date'].'</td>';
                                $count++;
                            }
                            echo '</tr>';
                        }
                    ?>
                </table>
    </fieldset>

    </body>
</html>