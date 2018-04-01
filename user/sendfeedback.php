<?php

require 'cloudesession.php';
require 'secure.php';
require_once '../csrf_request_type_functions.php';
require_once '../csrf_token_functions.php';
date_default_timezone_set("Asia/Kolkata");

if (empty($_POST)) {
    header('Location:feedback.php');
    exit();
} else {
    
    if (request_is_post()) {
        if (csrf_token_is_valid()) {
            $message = "VALID FORM SUBMISSION";
            
            if (isset($_POST['feedback'])) {
                
                $feedback     = secure($_POST['feedback']);
                $current_date = date('d F Y g:i:A');
                $month        = date('n');
                $year         = date('Y');
                
                
                $feedbackcollection = $db->selectCollection('feedback');
                
                if (strlen($feedback) == 0) {
                    echo "We all need people who will give us feedback. That's how we improve";
                    die();
                }else if(strlen($feedback) > 1500){
                    echo "Message too big we need feedback not essay";
                    die();
                }
                
                try {
                    
                    $document                 = array();
                    $document['studentid']    = $profile['_id'];
                    $document['fullname']     = $profile['fullname'];
                    $document['regdno']       = $profile['regdno'];
                    $document['msg']          = $feedback;
                    $document['posting_date'] = $current_date;
                    $document['month']        = intval($month);
                    $document['year']         = intval($year);
                    $feedbackcollection->insert($document);
                    echo "Thanks !!! We have received your feedback";
                    
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