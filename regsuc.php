<?php

require('session.php');
require_once 'csrf_request_type_functions.php';
require_once 'csrf_token_functions.php';


if (empty($_POST)) {
    header('Location:register.php');
    die();
}
else{

if(request_is_post()) {
    if(csrf_token_is_valid()) {


        $message = "VALID FORM SUBMISSION";

    require 'sanitize.php';
    date_default_timezone_set("Asia/Kolkata");

################ SANITIZING ##########################

    $fname     = sanitize($_POST['fname']);
    $unvregdno = sanitize($_POST['unvregdno']);
    $unvregdno = abs($unvregdno); // get absolute value only positive not negative
    $unvregdno = intval($unvregdno); // Get the Integer value only
    $password  = sanitize($_POST['password']);
    $cpassword = sanitize($_POST['cpassword']);
    $gender    = sanitize($_POST['gender']);
    $branch    = sanitize($_POST['branch']);
    $email     = sanitize($_POST['email']);
    $email     = filter_var($email, FILTER_SANITIZE_EMAIL); 

################ SANITIZING ##########################



############### VALIDATION #############################
    
if (strlen($fname) == 0) {
    echo "Fullname is Missing !";
    die();
} else if (ctype_digit($fname) == true) {
    echo "Name Cannot be Numbers !";
    die();
} else if (strlen($fname) > 40) {
    echo "Your Name is too big..Make it Short";
    die();
} elseif (strlen($unvregdno) == 0) {
    echo "University Number Missing";
    die();
} elseif (strlen($unvregdno) < 10) {
    echo "University Number Less than 10 digits";
    die();
} elseif (strlen($unvregdno) > 10) {
    echo "University Number exceeding more than 10 digits";
    die();
} else if (ctype_digit($unvregdno) == false) {
    echo "Invalid Registration Number";
    die();
} else if (strlen($password) == 0) {
    echo "Password Missing";
    die();
} elseif (strlen($password) <= 9) {
    echo "Password must be at least 10 characters long.";
    die();
} elseif (strlen($password) > 50) {
    echo "Password must not exceed 50 characters long.";
    die();
} elseif (strlen($cpassword) == 0) {
    echo "Confirm Password is Missing";
    die();
} elseif ($password != $cpassword) {
    echo "Passwords are not Matching";
    die();
} elseif ($gender != 'male' && $gender != 'female') {
    echo "Gender not defined";
    die();
} elseif ($branch != 'cse' && $branch != 'it' && $branch != 'etc' && $branch != 'eee' && $branch != 'ee' && $branch != 'mech' && $branch != 'civil') {
    echo "Branch not defined";
    die();
} else if(strlen($email) == 0){
    echo "E-Mail Missing";
    die();
} else if(strlen($email) > 300){
    echo "Email too long....We never accept long email ids";
    die();
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      echo "Invalid Email";
      die(); 
    }
else {
    
    
    
    
    try {
        $connection         = new MongoClient("mongodb://cloud#er_muk:cloud#&_juld9@localhost:27017");

        $db                 = $connection->selectDB('codetest');
        $collection         = $db->selectCollection('registration');
        $passkeycollection  = $db->selectCollection('passkey');
        $passkeycollection1 = $passkeycollection->find();
        $passkeycount       = $passkeycollection->count();
        $passkm             = "";
        if ($passkeycount == 1) {
            foreach ($passkeycollection1 as $passk) {
                $passkm = $passk["passkey"];
            }
        } else {
            $passkm = null;
        }
        
        $regdnocheck = $collection->find(array("regdno" => $unvregdno));

        $email_check = $collection->find(array("email" => $email));

        $checkresult = $regdnocheck->count(); 
        // Check Registration Number Exists

        $email_check_result = $email_check->count();
        // Check Email Exists



        if ($checkresult == 0) {
            
            // DO NOTHING
            
        } else {
            echo "University Number Already Exists !";
            die();
        }


        if($email_check_result == 0){
            // DO NOTHING
        }else {
            echo "E-Mail Already Exists !";
            die();
        }

        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        
        $document              = array();
        $document['fullname']  = $fname;
        $document['regdno']    = $unvregdno;
        $document['password']  = $password_hash;
        $document['gender']    = $gender;
        $document['branch']    = $branch;
        $document['email']     = $email;
        $document['passkey']   = $passkm;
        $document['certificate_status']   = "no";
        $document['createdAt'] = date("d/m/Y H:i:s");
        
        
        $collection->insert($document);
        echo "success";
        destroy_csrf_token();
        die();
    }
    
    catch (MongoConnectionException $e) {
        die("Connection Error !! Contact System Administrator");
    }
        
    catch (MongoException $e) {
        die("Exception !! Contact System Administrator");
    }
    
}



        if(csrf_token_is_recent()) {
            $message .= " (recent)";
           
        } else {
            $message .= " (not recent)";
            die_on_csrf_token_failure();
        }
    } else {
        die_on_csrf_token_failure();
    }
} else {
    // form not submitted or was GET request
    die_on_csrf_token_failure();
}

 

} // end of else block


?>