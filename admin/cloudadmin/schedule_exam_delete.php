<?php
require 'sess.php';

try
{


    if($_POST['testtype']==='mcq'){

            $schedule_collection = $db->selectCollection('testschedule');
            $results_collection  = $db->selectCollection('results');
            $mcq_answerscript    = $db->selectCollection('answerscript');
           
            $schedule_collection->remove();
            $results_collection->remove();
            $mcq_answerscript->remove();

            header('Location:schedule_exam.php');
            die();

    }else{


            $schedule_collection = $db->selectCollection('testschedule');
            $results_collection  = $db->selectCollection('results');
            $coding_answerscript = $db->selectCollection('coding_answerscript');

            
            $schedule_collection->remove();
            $results_collection->remove();
            $coding_answerscript->remove();

            header('Location:schedule_exam.php');
            die();


    }

    
        
   
}
catch(MongoConnectionException $e)
{
    die("Cannot Connect".$e->getMessage());
}
catch(MongoException $e)
{
    echo "<script>alert('Exception');</script>";
    header('refresh:0;url=schedule_exam.php');
    die();
}


?>