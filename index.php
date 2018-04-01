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
       
        
             $regdno   = sanitize($_POST['regdno']);
             $password = sanitize($_POST['password']);
             $passkey  = sanitize($_POST['passkey']);

             $username_sub = substr($regdno, 0, 10);
             $trim_user    = trim($username_sub);
             $get_int_user = (int) $trim_user;
             $regdno       = intval($get_int_user);
           

             $password_sub = substr($password, 0, 21);
             $trim_pass    = trim($password_sub);
             $password     = $trim_pass;
              
             $passkey_sub   = substr($passkey, 0, 25);
             $trim_pass_key = trim($passkey_sub);
             $passkey       = $trim_pass_key;
             

              if(request_is_post()) {
              if(csrf_token_is_valid()) {

                $message = "VALID FORM SUBMISSION";

                 if ($user->authenticate($regdno, $password, $passkey)) 
                  {
                      header('location: user/index.php');
                      exit;

                  }
                  else
                  {
                      $errorMessage = "WRONG CREDENTIALS";
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
        
            header('location: user/index.php');
            exit;
        } 
    
?>
<!DOCTYPE html>
<html>
   <head>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>CodeCracker - Student Assessment Application</title>
      <link href="css/style1.css" rel='stylesheet' type='text/css' />
      <link href="css/autowide.css" rel="stylesheet" type="text/css"/>
      <link href='css/sourcecode.css' rel='stylesheet' type='text/css'>
  
      <style>
         #ershow
         {
         font-family: 'Audiowide', cursive;
         }
      </style>
   </head>
   <body>
     <p class="tlt" style="position: absolute; z-index:-1; font-family: 'Source Code Pro'; text-align:justify; color:#d2d2d2;"  data-in-effect="fadeIn">
$servername = "localhost"; $username = "username"; $password = "password"; $dbname = "myDBPDO"; try { $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password); // set the PDO error mode to exception $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // prepare sql and bind parameters $stmt = $conn->prepare("INSERT INTO MyGuests (firstname, lastname, email) VALUES (:firstname, :lastname, :email)"); $stmt->bindParam(':firstname', $firstname); $stmt->bindParam(':lastname', $lastname); $stmt->bindParam(':email', $email); // insert a row $firstname = "John"; $lastname = "Doe"; $email = "john@example.com"; $stmt->execute(); // insert another row $firstname = "Mary"; $lastname = "Moe"; $email = "mary@example.com"; $stmt->execute(); // insert another row $firstname = "Julie"; $lastname = "Dooley"; $email = "julie@example.com"; $stmt->execute(); echo "New records created successfully"; } catch(PDOException $e) { echo "Error: " . $e->getMessage(); } $conn = null; $target_dir = "uploads/"; $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]); $uploadOk = 1; $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION); // Check if image file is a actual image or fake image if(isset($_POST["submit"])) { $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]); if($check !== false) { echo "File is an image - " . $check["mime"] . "."; $uploadOk = 1; } else { echo "File is not an image."; $uploadOk = 0; } } libxml_use_internal_errors(true); $myXMLData = ?xml version='1.0' encoding='UTF-8'?> John Doejohn@example.com</>"; $xml = simplexml_load_string($myXMLData); if ($xml === false) { echo "Failed loading XML: "; foreach(libxml_get_errors() as $error) { echo ", $error->message; } } else { print_r($xml); } $age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43"); asort($age); foreach($age as $x => $x_value) { echo "Key=" . $x . ", Value=" . $x_value; echo ""; }$age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43"); asort($age); foreach($age as $x => $x_value) { echo "Key=" . $x . ", Value=" . $x_value; echo ""; }// define variables and set to empty values $nameErr = $emailErr = $genderErr = $websiteErr = ""; $name = $email = $gender = $comment = $website = ""; if ($_SERVER["REQUEST_METHOD"] == "POST") { if (empty($_POST["name"])) { $nameErr = "Name is required"; } else { $name = test_input($_POST["name"]); // check if name only contains letters and whitespace if (!preg_match("/^[a-zA-Z ]*$/",$name)) { $nameErr = "Only letters and white space allowed"; } } if (empty($_POST["email"])) { $emailErr = "Email is required"; } else { $email = test_input($_POST["email"]); // check if e-mail address is well-formed if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { $emailErr = "Invalid email format"; } } if (empty($_POST["website"])) { $website = ""; } else { $website = test_input($_POST["website"]); // check if URL address syntax is valid (this regular expression also allows dashes in the URL) if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+@#\/%?=~_|!:,.;]*[-a-z0-9+@#\/%=~_|]/i",$website)) { $websiteErr = "Invalid URL"; } } if (empty($_POST["comment"])) { $comment = ""; } else { $comment = test_input($_POST["comment"]); } if (empty($_POST["gender"])) { $genderErr = "Gender is required"; } else { $gender = test_input($_POST["gender"]); } } function test_input($data) { $data = trim($data); $data = stripslashes($data); $data = htmlspecialchars($data); return $data; }date_default_timezone_set("America/New_York"); echo "The time is " . date("h:i:sa"); $myfile = fopen("webdictionary.txt", "r") or die("Unable to open file!"); // Output one character until end-of-file while(!feof($myfile)) { echo fgetc($myfile); } fclose($myfile);//Initialize the XML parser $parser=xml_parser_create(); //Function to use at the start of an element function
</p>
      <?php

 
          if (isset($errorMessage)){
         echo "<center><p id='ershow' style='font-size:30px; color:#FFFF00;'>$errorMessage</p></center>";
         
         }

         ?>
         
        <center>
         <img src="images/logo.png" height="60" width="350" style="margin-top: 5px;">
        </center> 

      <div class="login-box">

         <form method="post" action="" id="login">
            <input type="number" autocomplete="off" min="1" max="9999999999"  class="text" placeholder="University Registration No." name="regdno"  required pattern="\S+" title="Universtiy Number is required">
            <input type="password" autocomplete="off" placeholder="Password" name="password" required pattern="\S+" title="Password is required (* Whitespace Not Allowed)">
            <input type="password" autocomplete="off" placeholder="Passkey" name="passkey" required pattern="\S+" title="Passkey is required (* Whitespace Not Allowed)">
              <?php echo csrf_token_tag(); ?>
            
            <input type="submit"  name="login" value="LOG IN" >
         </form>
         
         <div class="remember">
            <h4 style="color:#000;"><a href="register.php">New User?</a></h4>
         </div>

     </div>



	  <script src="js/jquery-1.11.2.min.js"></script>
    <script src="js/disable.js" defer="defer"></script>

      <link rel="stylesheet" type="text/css" href="textillate/assets/animate.css">
      <link rel="stylesheet" type="text/css" href="textillate/assets/style.css">
      <script src="textillate/assets/jquery.fittext.js"></script>
	  <script src="textillate/assets/jquery.lettering.js"></script>
      <script src="textillate/jquery.textillate.js"></script>
<script type="text/javascript">
	
	$(function () {
    $('.tlt').textillate();
})
</script>
   </body>
</html>