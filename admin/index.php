<?php
require('session.php');
require('user.php');
require('sanitize.php');

$user     = new User();

require_once 'csrf_request_type_functions.php';
require_once 'csrf_token_functions.php';


$action = (!empty($_POST['login']) && ($_POST['login'] === 'LOG IN')) ? 'login' : 'show_form';
switch ($action) {
    case 'login':
       
        
             $username   = sanitize($_POST['username']);
             $password   = sanitize($_POST['password']);
           
                         

              if(request_is_post()) {
              if(csrf_token_is_valid()) {

                $message = "VALID FORM SUBMISSION";

                 if ($user->authenticate($username,$password)) 
                  {
                      header('location: cloudadmin/dashboard.php');
                      exit;

                  }
                  else
                  {
                      $errorMessage = "<span style='text-align:center;'>WRONG CREDENTIALS</span>";
                      break;
                  }


                if(csrf_token_is_recent()) {
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
            }           

       
    case 'show_form':
    default:

        $errorMessage = NULL;
}



        if($user->isLoggedIn())
        {
        
            header('location: cloudadmin/dashboard.php');
            exit;
        } 
    
?>
<!DOCTYPE html>
<html>
<head>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/home.css" rel="stylesheet">

</head>
<body>
 		<?php
          if (isset($errorMessage))
          {
         	echo $errorMessage;
          }

         ?>
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
          
            <div class="account-wall">
                   <form class="form-signin" method="post" id="login">
                <input type="text" class="form-control" placeholder="Email" name="username" required autofocus>
                <input type="password" class="form-control" placeholder="Password" name="password" required>
                  <?php echo csrf_token_tag(); ?>
                <input type="submit"  class="btn btn-lg btn-primary btn-block" name="login" value="LOG IN" >
                
                </form>
            </div>
          
        </div>
    </div>
</div>

</body>
</html>