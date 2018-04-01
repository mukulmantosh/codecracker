<?php
require 'cloudesession.php';

if (empty($_POST)) {
    die();
} else {
    
    
    
    $userid = $profile["_id"]; // ID required for updation of current user
    date_default_timezone_set("Asia/Kolkata");
    
    $questiondb         = $db->selectCollection('questions');
    $testcollection     = $db->selectCollection('testschedule');
    $resultcollection   = $db->selectCollection('results');
    $answerscript       = $db->selectCollection('coding_answerscript');
    $registercollection = $db->selectCollection('registration');
    
    $testres = $testcollection->find();
    
    foreach ($testres as $test) {
        $test["timer"];
        $test["question"];
        $test["testid"];
        $test["testname"];
    }
    
    $testid      = $test["testid"];
    $result_find = $resultcollection->find(array(
        "userid" => $userid,
        "testid" => $test["testid"]
    ));
    
    foreach ($result_find as $res) {
        $res["starttime"];
    }
    
    $TimeStart   = $res["starttime"];
    $TimeEnd     = strtotime(date("H:i:s"));
    $time_taken  = ($TimeEnd - $TimeStart);
    $questionres = $questiondb->find(array(
        'category' => $test["testname"]
    ));
    
    
    
    $answerscript_find = $answerscript->find(array(
        "userid" => $userid,
        "testid" => $test["testid"]
    ))->count();
    
    if ($answerscript_find == 0) {
        
        $coding_answer              = htmlentities($_POST['clikeTextarea']);
        $document                   = array();
        $document['fullname']       = $profile['fullname'];
        $document['userid']         = $userid;
        $document['category']       = $test['testname'];
        $document['testtype']       = $test['testtype'];
        $document['testid']         = $testid;
        $document['questionnumber'] = intval(htmlentities(base64_decode($_POST['qno'])));
        $document['answer']         = (string) $coding_answer;
        $document['build_status']   = 'Not build Yet';
        $document['score']          = 0;
        $answerscript->insert($document);
        
        $resultcollection->update(array(
            'userid' => $userid,
            'testid' => $testid
        ), array(
            '$set' => array(
                'resultstatus' => 'done',
                'timetaken' => $time_taken
            )
        ));
        
        
    }
    
    echo "success";
    
    
    /** Unsetting Passkey **/
    
    
    $registercollection->update(array(
        '_id' => new MongoId($userid)
    ), array(
        '$set' => array(
            "passkey" => null
        )
    ));
    
    
    /** Unsetting Passkey **/
    
}

?>