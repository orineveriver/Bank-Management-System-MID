<?php

            $accno = $type = $firstname = $lastname = $nid = $dob = $gender = $email = $phone = $nnid = $pass = $cpass = "";
            $notavailable = $typeerr = $firstnameerr = $lastnameerr = $niderr = $doberr = $gendererr = $emailerr = $phoneerr = $nniderr = $passerr = $cpasserr = "";

            if($_SERVER['REQUEST_METHOD'] == "POST" && $_REQUEST['button'] == "Submit") {

                if(empty($_POST['type']))
                {
                    $typeerr = "Please select a type!";
                }

                else if(empty($_POST['firstname']))
                {
                    $firstnameerr = "Please enter your First Name!";
                }

                else if(empty($_POST['lastname']))
                {
                    $lastnameerr = "Please enter your Last Name!";
                }

                else if(empty($_POST['nid']))
                {
                    $niderr = "Please enter your NID Number!";
                }

                else if(empty($_POST['dob']))
                {
                    $doberr = "Please select Your DOB!";
                }

                else if(empty($_POST['gender']))
                {
                    $gendererr = "Please select your gender!";
                }

                else if(empty($_POST['email']))
                {
                    $emailerr = "Please enter your Email!";
                }

                else if(empty($_POST['phone']))
                {
                    $phoneerr = "Please enter your Your Number!";
                }

                else if(empty($_POST['pass']))
                {
                    $passerr = "Please enter your Password!";
                }

                else if(strlen($_POST['pass'])<8)
                {
                    $passerr = "Password must be 8 character!";
                }

                else if(empty($_POST['cpass']))
                {
                    $cpasserr = "Please enter your Confirm Password!";
                }

                else if($_POST['cpass']!=$_POST['pass'])
                {
                    $cpasserr = "Password doesn't match!";
                }
            
                else{

                    $type = $_POST['type'];
                    $firstname = $_POST['firstname'];
                    $lastname = $_POST['lastname'];
                    $nid = $_POST['nid'];
                    $dob = $_POST['dob'];
                    $gender = $_POST['gender'];
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];
                    $pass = $_POST['pass'];
                    
                    $log_file = fopen("../database/logintable.txt", "r");
                    
                    $data = fread($log_file, filesize("../database/logintable.txt"));
                    
                    fclose($log_file);
                    
                    $data_filter = explode("\n", $data);

                    for($i = 0; $i< count($data_filter)-1; $i++) {

                        $json_decode = json_decode($data_filter[$i], true);

                        if( $json_decode['username'] == $email) 
                        {
                            $notavailable = "Already have an Account!!!";
                        }
                        
                    }      

                    $log_file = fopen("../database/registrationtable.txt", "r");
                    
                    $data = fread($log_file, filesize("../database/registrationtable.txt"));
                    
                    fclose($log_file);
                    
                    $data_filter = explode("\n", $data);

                    for($i = 0; $i< count($data_filter)-1; $i++) {

                        $json_decode = json_decode($data_filter[$i], true);

                        if( $json_decode['type'] == $type) 
                        {
                            $accno = $json_decode['accno']+1;
                        }
                        
                    }   

                    
                    if($notavailable == "")      
                        {
                            $details = array('firstname' => $firstname, 'lastname' => $lastname, 'nid' => $nid, 'dob' => $dob, 'gender' => $gender, 'email' => $email, 'phone' => $phone, 'nnid' => null, 'type' => $type, 'accno' => $accno) ;
                            $details_encoded = json_encode($details);

                            $filepath = "../database/registrationtable.txt";

                            $reg_file = fopen($filepath, "a");
                            fwrite($reg_file, $details_encoded . "\n");	
                            fclose($reg_file);

                            $usertable = array('username' => $email, 'password' => $pass, 'type' => $type, 'status' => 'active');
                            $usertable_encoded = json_encode($usertable);

                            $log_filepath = "../database/logintable.txt";

                            $log_file = fopen($log_filepath, "a");
                            fwrite($log_file, $usertable_encoded . "\n");	
                            fclose($log_file);

                            $notavailable = "Registration Complete!!!";
                        }
                    }
            
            }
        ?>