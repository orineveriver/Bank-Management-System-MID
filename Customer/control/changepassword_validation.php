<?php

            session_start();          
            $username = $_SESSION['user'];

            $email = $type = $firstname = $lastname = $nid = $dob = $gender = $phone = $nnid = $type = "";

            $log_file = fopen("../database/registrationtable.txt", "r");                    
            $data = fread($log_file, filesize("../database/registrationtable.txt"));                    
            fclose($log_file);
            
            $data_filter = explode("\n", $data);
            
            for($i = 0; $i< count($data_filter)-1; $i++) {
        
                $json_decode = json_decode($data_filter[$i], true);
                
                if($json_decode['email'] == $username) 
                {
                    $firstname = $json_decode['firstname'];
                    $lastname = $json_decode['lastname'];
                    $nid = $json_decode['nid'];
                    $dob = $json_decode['dob'];
                    $gender = $json_decode['gender'];
                    $email = $json_decode['email'];
                    $phone = $json_decode['phone'];
                    $nnid = $json_decode['nnid'];
                    $type = $json_decode['type'];
                }
            }

            $emptyerr = $passerr = "";


            if($_SERVER['REQUEST_METHOD'] == "POST") {

                if(empty($_POST['pass']) || empty($_POST['cpass'])) {
                    $emptyerr = "Please Fill up the form properly!";
                }

                else if($_POST['pass'] != $_POST['cpass']) {
                    $passerr="Password doesn't Match";
                }

                else if(strlen($_POST['pass']) < 8) {
                    $passerr="Password Must be minimum 8 character!";
                }
                else {

                    $log_file = fopen("../database/logintable.txt", "r");
                    
                    $data = fread($log_file, filesize("../database/logintable.txt"));
                    
                    fclose($log_file);
                    
                    $data_filter = explode("\n", $data);
                    
                    $log_filepath = "../database/Temp.txt";

                    $log_file = fopen($log_filepath, "a");

                    for($i = 0; $i< count($data_filter)-1; $i++) {
                        $json_decode = json_decode($data_filter[$i], true);
                        if($json_decode['username'] == $username) 
                        {
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

                    $log_file = fopen("../database/logintable.txt", "w");
                    fwrite($log_file, $data);
                    fclose($log_file);

                    $log_file = fopen("../database/Temp.txt", "w");
                    fwrite($log_file, "");                    
                    fclose($log_file);
                    
                    header("Location: ../view/dashboard.php");
                }
            }
            
        ?>