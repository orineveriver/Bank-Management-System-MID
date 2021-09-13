<?php
include("../control/transactionhistory_validation.php");
?> 

<!DOCTYPE html>
<html>
    <head>
        <title>Transaction History</title>
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
            <legend><b>Transaction History</b></legend>
                <table style="border: 1px solid black;">
                    <tr style="border: 1px solid black;">
                        <td style="border: 1px solid black;"><b>Serial</b></td>
                        <td style="border: 1px solid black;"><b>Amount</b></td>
                        <td style="border: 1px solid black;"><b>Type</b></td>
                        <td style="border: 1px solid black;"><b>Date</b></td>
                    </tr>
                    <?php
                        for($i = 0; $i< count($data_filter)-1; $i++) {

                            echo '<tr style="border: 1px solid black;">';                          
                            $json_decode = json_decode($data_filter[$i], true);
                            if($json_decode['receiver'] == $username || $json_decode['sender'] == $username)
                            {
                                echo '<td style="border: 1px solid black;">'.$count.'</td>';
                                echo '<td style="border: 1px solid black;">'.$json_decode['amount'].'</td>';
                                if($json_decode['sender'] == $username){
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