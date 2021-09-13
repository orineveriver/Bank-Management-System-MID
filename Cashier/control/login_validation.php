<?php
            $username = $password ="";
            $usernameerr = $passworderr ="";
            $loginfail = "";

            if($_SERVER['REQUEST_METHOD'] == "POST" && $_REQUEST['button'] == "Login") {

                if(empty($_POST['username'])) {                    
                    $usernameerr = "Please Fill up the Username!";
                }

                else if(empty($_POST['password'])) {                    
                    $passworderr = "Please Fill up the password!";
                }

                else {
                    $username = $_POST['username'];
                    $password = $_POST['password'];

                    $log_file = fopen("../database/logintable.txt", "r");                    
                    $data = fread($log_file, filesize("../database/logintable.txt"));                    
                    fclose($log_file);
                    
                    $data_filter = explode("\n", $data);
                    
                    for($i = 0; $i< count($data_filter)-1; $i++) {

                        $json_decode = json_decode($data_filter[$i], true);
                        if($json_decode['username'] == $username && $json_decode['password'] == $password && $json_decode['status'] == 'active') 
                        {
                            if($json_decode['type'] == "cashier")
                            {
                                session_start();
                                $_SESSION['user'] = $username;
                                header("Location: ../view/dashboard.php");
                            }
                        }
                    }
                    $loginfail = "Wrong Password! Please Try Again.";
                }
            }
        ?>