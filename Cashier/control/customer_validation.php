<?php

            session_start();          
            $username = $_SESSION['user'];

            $searchmail = $error = "";

            if($_SERVER['REQUEST_METHOD'] == "POST" && $_REQUEST['button'] == "Search") {

                $log_file = fopen("../database/registrationtable.txt", "r");                    
                $data = fread($log_file, filesize("../database/registrationtable.txt"));                    
                fclose($log_file);
                
                $data_filter = explode("\n", $data);
                
                for($i = 0; $i< count($data_filter)-1; $i++) {
            
                    $json_decode = json_decode($data_filter[$i], true); 
    
                    if($json_decode['accno'] == $_POST['sender']) 
                    {
                        $searchmail =$json_decode['email'];
                    }
                }
                if($searchmail==""){
                    $error="Account not found";
                }
            }
            
?>