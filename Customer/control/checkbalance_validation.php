<?php
            session_start();          
            $username = $_SESSION['user'];

            $balance = "";

            $log_file = fopen("../database/balancetable.txt", "r");                    
            $data = fread($log_file, filesize("../database/balancetable.txt"));                    
            fclose($log_file);
            
            $data_filter = explode("\n", $data);
            
            for($i = 0; $i< count($data_filter)-1; $i++) {
        
                $json_decode = json_decode($data_filter[$i], true);
                
                if($json_decode['username'] == $username) 
                {
                    $balance = $json_decode['balance'];
                }
            }        
?>