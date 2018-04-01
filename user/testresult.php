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
    $leaderboard        = $db->selectCollection('leaderboard');
    $answerscript       = $db->selectCollection('answerscript');
    $registercollection = $db->selectCollection('registration');
    $correct_credit     = 5;
    $wrong_credit       = 2;
    $right_answer       = 0;
    $wrong_answer       = 0;
    $testres            = $testcollection->find();
    
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
    
    
    
    $right_answer = 0;
    $wrong_answer = 0;
    
    $answerscript_find = $answerscript->find(array(
        "userid" => $userid,
        "testid" => $test["testid"]
    ))->count();
    
    if ($answerscript_find == 0) {
        
        
        foreach ($questionres as $m) {
            foreach ($_POST as $question => $option) {
                
                // echo $question."<br />";
                // echo $option."<br />";
                
                $m["questionnumber"];
                $d = $m["answer"];
                
                
                if ($m["questionnumber"] == $question) {
                    $options = base64_decode($option);
                    $option  = intval($options);
                    $answerscript->update(array(
                        
                        'fullname' => $profile["fullname"],
                        'userid' => $userid,
                        'category' => $test["testname"],
                        'testid' => $testid
                        
                    ), array(
                        '$push' => array(
                            'questionnumber' => $question,
                            'option' => $option
                        )
                    ), array(
                        "upsert" => true
                        
                        
                    ));
                    
                    if (password_verify($option, $d)) {
                        
                        $right_answer++;
                        
                    } else {
                        $wrong_answer++;
                    }
                } //########## END OF IF STATEMENT #############
            } //####### END OF NESTED FOREACH LOOP ########
        } //####### END OF FIRST FOREACH LOOP ##############
    } //####### END OF IF STATEMENT IN THE BEGINNING ##############
    
    
    
    /** Updating Datbase **/
    
    $finalscore = $right_answer * $correct_credit - $wrong_answer * $wrong_credit;
    $resultcollection->update(array(
        'userid' => $userid,
        'testid' => $testid
    ), array(
        '$set' => array(
            'resultstatus' => 'done',
            'score' => $finalscore,
            'testid' => $testid,
            'timetaken' => $time_taken
        )
    ));
    
    ##################### UPDATING LEADERBOARD #####################
    
    $leaderboard->update(array(
        'fullname' => $profile["fullname"],
        'userid' => $userid,
        'regdno' => $profile['regdno']
        
    ), array(
        '$push' => array(
            'score' => $finalscore
        )
    ), array(
        "upsert" => true
    ));
    $total = 0;
    $find  = $leaderboard->find(array(
        "fullname" => $profile["fullname"]
    ));
    
    foreach ($find as $f) {
        $count = count($f["score"]);
        for ($i = 0; $i < $count; $i++) {
            $total = array_sum($f["score"]);
        }
    }
    
    $leaderboard->update(array(
        'fullname' => $profile["fullname"]
        
    ), array(
        '$set' => array(
            'total' => $total
        )
    ));
    
    echo "RIGHT ANSWERS : <span style='color:#99cc00;'>" . $right_answer . "</span> | WRONG ANSWERS : 
<span style='color:#ff0000;'>" . $wrong_answer . "</span>";
    
    echo "<br><br>";
    
    echo "Total Score : <span style='color:#0099cc;'>" . $finalscore . "</span>";
    
    ##################### UPDATING LEADERBOARD #####################
    
    
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