<?php
session_start();          
$username = $_SESSION['user'];

$accno = $email = $type = $firstname = $lastname = $nid = $dob = $gender = $phone = $nnid = $type = "";
$notavailable = $typeerr = $firstnameerr = $lastnameerr = $niderr = $doberr = $gendererr = $emailerr = $phoneerr = $nniderr = $passerr = $cpasserr = "";

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

if($_SERVER['REQUEST_METHOD'] == "POST") {

    if(empty($_POST['firstname']))
    {
        $firstnameerr = "First Name can't be empty!";
    }

    else if(empty($_POST['lastname']))
    {
        $lastnameerr = "Last Name can't be empty!";
    }

    else if(empty($_POST['phone']))
    {
        $phoneerr = "Number can't be empty!";
    }

    else if(empty($_POST['nnid']))
    {
        $nniderr = "Nominee NID number can't be empty!";
    }

    else{
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $phone = $_POST['phone'];
        $nnid = $_POST['nnid'];

        $log_file = fopen("../database/registrationtable.txt", "r");
                    
        $data = fread($log_file, filesize("../database/registrationtable.txt"));
                    
        fclose($log_file);
                    
        $data_filter = explode("\n", $data);
                    
        $log_filepath = "../database/Temp.txt";

        $log_file = fopen($log_filepath, "a");

        for($i = 0; $i< count($data_filter)-1; $i++) {
            $json_decode = json_decode($data_filter[$i], true);
            if($json_decode['email'] == $username) 
            {
                $usertable = array('firstname' => $firstname, 'lastname' => $lastname, 'nid' => $nid, 'dob' => $dob, 'gender' => $gender, 'email' => $email, 'phone' => $phone, 'nnid' => $nnid, 'type' => $type, 'accno' => $accno);
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

        $log_file = fopen("../database/registrationtable.txt", "w");
        fwrite($log_file, $data);                    
        fclose($log_file);

        $log_file = fopen("../database/Temp.txt", "w");
        fwrite($log_file, "");                    
        fclose($log_file);
                    
        header("Location: ../view/profile.php");
    }
}

?>