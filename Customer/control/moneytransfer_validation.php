<?php

            session_start();          
            $username = $_SESSION['user'];

            $date= date("d-m-Y");

            $senderemail = $receivermail = $senderaccno = $receiveaccno = "";
            $error = $accno = $amount = $password = "";
            $accbalance = $accpassword =  "";


            $log_file = fopen("../database/logintable.txt", "r");                    
            $data = fread($log_file, filesize("../database/logintable.txt"));                    
            fclose($log_file);
            
            $data_filter = explode("\n", $data);
            
            for($i = 0; $i< count($data_filter)-1; $i++) {
        
                $json_decode = json_decode($data_filter[$i], true);
                
                if($json_decode['username'] == $username) 
                {
                    $accpassword = $json_decode['password'];
                }
            }

            $log_file = fopen("../database/balancetable.txt", "r");                    
            $data = fread($log_file, filesize("../database/balancetable.txt"));                    
            fclose($log_file);
            
            $data_filter = explode("\n", $data);
            
            for($i = 0; $i< count($data_filter)-1; $i++) {
        
                $json_decode = json_decode($data_filter[$i], true);
                
                if($json_decode['username'] == $username) 
                {
                    $accbalance = $json_decode['balance'];
                }
            }


            if($_SERVER['REQUEST_METHOD'] == "POST") {

            $log_file = fopen("../database/registrationtable.txt", "r");                    
            $data = fread($log_file, filesize("../database/registrationtable.txt"));                    
            fclose($log_file);
            
            $data_filter = explode("\n", $data);
            
            for($i = 0; $i< count($data_filter)-1; $i++) {
        
                $json_decode = json_decode($data_filter[$i], true);
                
                if($username == $json_decode['email']) 
                {
                    $senderemail = $json_decode['email'];
                    $senderaccno = $json_decode['accno'];
                }

                if($json_decode['accno'] == $_POST['sender']) 
                {
                    $receivermail = $json_decode['email'];
                    $receiveaccno = $json_decode['accno'];
                }
            }

                if(empty($_POST['amount']))
                {
                    $error = "Amount cann't be empty!";
                }

                else if(empty($_POST['sender']))
                {
                    $error = "Sender Account cann't be empty!";
                }

                else if(empty($_POST['password']))
                {
                    $error = "Password cann't be empty!";
                }

                else if($_POST['password']!=$accpassword)
                {
                    $error = "Wrong Password!";
                }

                else if($_POST['amount']>$accbalance)
                {
                    $error = "Insafficient Balance!";
                }

                else if($_POST['sender']!=$receiveaccno)
                {
                    $error = "Sender not Found!!!!";
                }

                else {
                    $accno = $_POST['sender'];
                    $amount = $_POST['amount'];

                    $log_file = fopen("../database/balancetable.txt", "r");
                    
                    $data = fread($log_file, filesize("../database/balancetable.txt"));
                    
                    fclose($log_file);
                    
                    $data_filter = explode("\n", $data);
                    
                    $log_filepath = "../database/Temp.txt";

                    $log_file = fopen($log_filepath, "a");

                    for($i = 0; $i< count($data_filter)-1; $i++) {
                        $json_decode = json_decode($data_filter[$i], true);                        
                        
                        if($json_decode['username'] == $senderemail){

                            $usertable = array('username' => $json_decode['username'], 'accno' => $json_decode['accno'],'type' => $json_decode['type'], 'balance' => (string)((int)$json_decode['balance']-(int)$amount));
                            $usertable_encoded = json_encode($usertable);
                            fwrite($log_file, $usertable_encoded . "\n");
                        }

                        else if($json_decode['username'] == $receivermail){

                            $usertable = array('username' => $json_decode['username'], 'accno' => $json_decode['accno'],'type' => $json_decode['type'], 'balance' => (string)((int)$json_decode['balance']+(int)$amount));
                            $usertable_encoded = json_encode($usertable);
                            fwrite($log_file, $usertable_encoded . "\n");
                        }
                        else {
                            $usertable_encoded = json_encode($json_decode);
                            fwrite($log_file, $usertable_encoded . "\n");	
                        } 
                    }
                    fclose($log_file);

                    $log_file = fopen("../database/Temp.txt", "r");                    
                    $data = fread($log_file, filesize("../database/Temp.txt"));                    
                    fclose($log_file);

                    $log_file = fopen("../database/balancetable.txt", "w");
                    fwrite($log_file, $data);                    
                    fclose($log_file);

                    $log_file = fopen("../database/Temp.txt", "w");
                    fwrite($log_file, "");                    
                    fclose($log_file);

                    

                    $filepath = "../database/transactiontable.txt";
                    $reg_file = fopen($filepath, "a");

                    $details = array('sender' => $senderemail, 'receiver' => $receivermail, 'amount' => $amount, 'date' => $date) ;
                    $details_encoded = json_encode($details);
                    fwrite($reg_file, $details_encoded . "\n");	

              
                    fclose($reg_file);

                    header('location: ../view/checkbalance.php');
                    
                }
            }
            
        ?>