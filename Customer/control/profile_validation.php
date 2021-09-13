<?php
    session_start();
    $username = $_SESSION['user'];

    $accno = $email = $type = $firstname = $lastname = $nid = $dob = $gender = $phone = $nnid = $type = "";

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
            $accno = $json_decode['accno'];
        }
    }
?>