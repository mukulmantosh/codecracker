<?php
require 'cloudesession.php';
require 'secure.php';
require_once '../csrf_request_type_functions.php';
require_once '../csrf_token_functions.php';

if (empty($_POST)) {
    header('Location:changepassword.php');
    exit();
} else {
    
    if (request_is_post()) {
        if (csrf_token_is_valid()) {
            $message = "VALID FORM SUBMISSION";
            
            
            $current_password     = secure($_POST['current_password']);
            $new_password         = secure($_POST['new_password']);
            $confirm_new_password = secure($_POST['confirm_new_password']);
            $hashed_password      = $profile["password"];
            $new_password_hash    = password_hash($new_password, PASSWORD_DEFAULT);
            
            
            if (strlen($current_password) == 0) {
                echo "Current Password is empty";
                die();
            } else if (strlen($new_password) == 0) {
                echo "New Password is empty";
                die();
            } else if (strlen($confirm_new_password) == 0) {
                echo "Confirm Password is empty";
                die();
            } else if (!password_verify($current_password, $hashed_password)) {
                echo "Current Password Matching Failed !";
                die();
            } else if ($new_password != $confirm_new_password) {
                echo "Password Confirmation Failed !";
                die();
            } elseif (strlen($new_password) <= 9) {
                echo "Password must be at least 10 characters long.";
                die();
            } else {
                
                try {
                    $registercollection = $db->selectCollection('registration');
                    $id                 = $profile["_id"];
                    $registercollection->update(array(
                        '_id' => new MongoId($id)
                    ), array(
                        '$set' => array(
                            "password" => $new_password_hash
                        )
                    ));
                    echo "success";
                    die();
                    
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