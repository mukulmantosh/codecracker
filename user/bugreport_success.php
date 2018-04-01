<?php

require 'cloudesession.php';
require 'secure.php';
require_once '../csrf_request_type_functions.php';
require_once '../csrf_token_functions.php';
date_default_timezone_set("Asia/Kolkata");

if (empty($_POST)) {
    header('Location:bugreport.php');
    exit();
} else {
    
    if (request_is_post()) {
        if (csrf_token_is_valid()) {
            $message = "VALID FORM SUBMISSION";
            
            if (isset($_POST['bug'])) {
                
                $bug     	  = secure($_POST['bug']);
                $current_date = date('d F Y g:i:A');
                $month        = date('n');
                $year         = date('Y');
                
                
                $bugcollection = $db->selectCollection('bug_report');
                
                if (strlen($bug) == 0) {
                    echo "Details Missing";
                    die();
                }else if(strlen($feedback) > 3000){
                    echo "Vulnerabilities Details too long. Please make it short";
                    die();
                }
                
                try {
                    
                    $document                 = array();
                    $document['studentid']    = $profile['_id'];
                    $document['fullname']     = $profile['fullname'];
                    $document['regdno']       = $profile['regdno'];
                    $document['msg']          = $bug;
                    $document['posting_date'] = $current_date;
                    $document['month']        = intval($month);
                    $document['year']         = intval($year);
                    $bugcollection->insert($document);
                    echo "Thank You for providing the details. We appreciate your support for making this application more secure.";
                    
                }
                
                catch (MongoConnectionException $e) {
                    die("Connection not established");
                }
                catch (MongoException $e) {
                    die("Exception Caught");
                }
                
            }
            
            
            
            
            if (csrf_token_is_recent()) {
                $message .= " (recent)";
            } else {
                $message .= " (not recent)";
                die_on_csrf_token_failure();
            }
        } else {
            $message = "CSRF TOKEN MISSING OR MISMATCHED";
            die_on_csrf_token_failure();
        }
    } else {
        // form not submitted or was GET request
        $message = "Please login.";
        die_on_csrf_token_failure();
    }
    
    
    
    
    
    
}

?>