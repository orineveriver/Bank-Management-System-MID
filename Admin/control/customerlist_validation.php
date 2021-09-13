<?php
    session_start();          
    $username = $_SESSION['user'];

    $count = "1";

    $log_file = fopen("../database/registrationtable.txt", "r");                    
    $data = fread($log_file, filesize("../database/registrationtable.txt"));                    
    fclose($log_file);
                    
    $data_filter = explode("\n", $data);
?>