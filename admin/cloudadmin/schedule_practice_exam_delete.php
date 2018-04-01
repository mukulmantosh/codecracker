<?php
require 'sess.php';

try
{

    $collection= $db->selectCollection('practiceschedule');
    $practice_result = $db->selectCollection('results_practice');

    if(isset($_POST['delschedule']))
    {

        $collection->remove();
        $practice_result->remove();
        header('refresh:0;url=schedule_practice_exam.php');
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
    header('refresh:0;url=schedule_practice_exam.php');
    die();
}


?>