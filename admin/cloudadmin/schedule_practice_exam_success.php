<?php

require 'sess.php';
require 'secure.php';
if(empty($_POST))
{
    header('Location:schedule_exam.php');
    die();
}
else
{
    $category=secure($_POST['category']);
    $timer=secure($_POST['timer']);
    $question =secure($_POST['question']);

    $addquestioncollection= $db->selectCollection('practice_test');
    $test = $db->selectCollection('test');
    $test_find= $test->find(array("testname" => $category));
    foreach($test_find as $t){
        $type= $t["testtype"];
    }

    if($type=="mcq"){

    date_default_timezone_set('Asia/Kolkata');
    $date= date('dmYhis');
    $schedule= $db->selectCollection('practiceschedule');
    $schedulecount= $schedule->count();
    $timer= $timer * 60;


   
    $countquestion= $addquestioncollection->find(array("category" =>$category))->count();

    if($question > $countquestion || $question < 2)
    {

        echo "Question Limit Exceeded";
        die();
    }




    if($schedulecount > 0)
    {


        echo "One Test Already Running..Cannot schedule";
        die();
    }
    else
    {

        $document=array();
        $document['testid']= mt_rand().$date;
        $document['testname'] = $category;
        $document['testtype'] = $type;
        $document['timer'] = $timer;
        $document['question'] = $question;
        $document['teststatus']= 'active';
        $schedule->insert($document);
        echo "success";
        die();

    }


    }
  

}



?>