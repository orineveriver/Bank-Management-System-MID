<?php
include("../control/customerlist_validation.php");
?> 

<!DOCTYPE html>
<html>
    <head>
        <title>Customer List</title>
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
            <legend><b>Customer List</b></legend>
            <form action="" method="post">
                Seach by Account No:<input type="text" name="accno" id="accno">
                <input type="submit" name="search" id="search" Value="search">
                <br>
            
            </form>

                <table style="border: 1px solid black;">
                    <tr style="border: 1px solid black;">
                        <td style="border: 1px solid black;"><b>Serial</b></td>
                        <td style="border: 1px solid black;"><b>Name</b></td>
                        <td style="border: 1px solid black;"><b>Account No</b></td>
                        <td style="border: 1px solid black;"><b>Phone No</b></td>                        
                        <td style="border: 1px solid black;"><b>Email</b></td>       
                    </tr>
                    <?php
                    if($_SERVER['REQUEST_METHOD'] == "POST"){
                        if(empty($_POST['accno'])){
                            $count = 1;
                            for($i = 0; $i< count($data_filter)-1; $i++) {

                            echo '<tr style="border: 1px solid black;">';                          
                            $json_decode = json_decode($data_filter[$i], true);  
                            if($json_decode['type']=='customer'){
                                echo '<td style="border: 1px solid black;">'.$count.'</td>';                              
                                echo '<td style="border: 1px solid black;">'.$json_decode['firstname'].' '.$json_decode['lastname'].'</td>';                              
                                echo '<td style="border: 1px solid black;">'.$json_decode['accno'].'</td>';                              
                                echo '<td style="border: 1px solid black;">'.$json_decode['phone'].'</td>';                              
                                echo '<td style="border: 1px solid black;">'.$json_decode['email'].'</td>';   
                                $count++;
                            }
                            echo '</tr>';
                            }
                        }
                        else {
                            for($i = 0; $i< count($data_filter)-1; $i++) {

                                echo '<tr style="border: 1px solid black;">';                          
                                $json_decode = json_decode($data_filter[$i], true); 
                                if($json_decode['phone']==$_POST['accno'] || $json_decode['firstname']==$_POST['accno'] || $json_decode['accno']==$_POST['accno'] ) {
                                    echo '<td style="border: 1px solid black;">'.$count.'</td>';                              
                                    echo '<td style="border: 1px solid black;">'.$json_decode['firstname'].' '.$json_decode['lastname'].'</td>';                              
                                    echo '<td style="border: 1px solid black;">'.$json_decode['accno'].'</td>';                              
                                    echo '<td style="border: 1px solid black;">'.$json_decode['phone'].'</td>';                              
                                    echo '<td style="border: 1px solid black;">'.$json_decode['email'].'</td>';     
                                    $count++;
                                echo '</tr>';
                                }
                            }
                        }
                    }

                    ?>
                </table>
        </fieldset> 
    </body>
</html>