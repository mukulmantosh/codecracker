<?php
require 'cloudesession.php';

$url = 'http://api.hackerrank.com/checker/submission.json';
$userid = $profile['_id'];
$leaderboard = $db->selectCollection('leaderboard');
$test_collection = $db->selectCollection('testschedule');
$test_collection_find = $test_collection->find(array(
    "testtype" => "coding"
));

foreach($test_collection_find as $t)
    {
    $t["testid"];
    }

$testing_id = $t['testid'];
$coding_collection = $db->selectCollection('coding_answerscript');
$coding_collection_find = $coding_collection->find(array(
    "testid" => $testing_id,
    "userid" => new MongoId($userid)
));
$coding_collection_count = $coding_collection_find->count();

if ($coding_collection_count > 0)
    {
    foreach($coding_collection_find as $code)
        {
        $code["category"];
        $code["testtype"];
        $code["questionnumber"];
        $code["answer"];
        $code["build_status"];
        $code["score"];
        }

    if ($code["build_status"] == "done")
        {
        echo "Sorry! Program has been tested already";
        die();
        }

    $code_category = $code["category"];
    $code_testtype = $code["testtype"];
    $code_qno = intval($code["questionnumber"]);
    $code_answer = html_entity_decode($code["answer"]);
    $question_collection = $db->selectCollection('questions');
    $question_collection_find = $question_collection->find(array(
        "type" => "coding"
    ));
    foreach($question_collection_find as $ques)
        {
        $ques["input"];
        $ques["output"];
        }

    $code_input = $ques["input"];
    $code_output = $ques["output"];
    $api_key = "hackerrank|268125-771|e3a932824f594ef54c6f4424a3a375a25675ab65";
    $source = urlencode($code_answer);
    $lang = 2;
    $testcases = $code_input;
    $fields_string = "";
    $fields = array(
        'source' => $source,
        'lang' => $lang,
        'testcases' => $testcases,
        'api_key' => $api_key
    );

    // url-ify the data for the POST

    foreach($fields as $key => $value)
        {
        $fields_string.= $key . '=' . $value . '&';
        }

    rtrim($fields_string, '&');

    // open connection

    $ch = curl_init();

    // set the url, number of POST vars, POST data

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, count($fields));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // execute post

    $result = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    // close connection

    curl_close($ch);

    // print_r($result);

    $a = json_decode($result, true);
    if ($httpcode >= 200 && $httpcode < 300)
        {
        $string = "";
        foreach($a as $k)
            {
            $string = implode(",", $k["stdout"]);
            }

        $string1 = explode(",", $string);
        $string1 = json_encode($string1);
        if ($string1 == $code_output)
            {
            echo "success";
            $coding_collection->update(array(
                'testid' => $testing_id,
                'userid' => new MongoId($userid)
            ) , array(
                '$set' => array(
                    'build_status' => "done",
                    'score' => 10
                )
            ));
            $finalscore = 10;
            $leaderboard->update(array(
                'fullname' => $profile["fullname"],
                'regdno' => $profile["regdno"],
                'userid' => new MongoId($userid)
            ) , array(
                '$push' => array(
                    'coding_score' => $finalscore
                )
            ) , array(
                "upsert" => true
            ));
            $total = 0;
            $find = $leaderboard->find(array(
                "userid" => new MongoId($userid)
            ));
            foreach($find as $f)
                {
                $count = count($f["coding_score"]);
                for ($i = 0; $i < $count; $i++)
                    {
                    $total = array_sum($f["coding_score"]);
                    }
                }

            $leaderboard->update(array(
                'fullname' => $profile["fullname"],
                'regdno' => $profile["regdno"],
                'userid' => new MongoId($userid)
            ) , array(
                '$set' => array(
                    'coding_total' => $total
                )
            ));
            }
          else
            {
            echo "Program failed to execute";
            $coding_collection->update(array(
                'testid' => $testing_id,
                'userid' => new MongoId($userid)
            ) , array(
                '$set' => array(
                    'build_status' => "done",
                    'score' => 0
                )
            ));
            $finalscore = 0;
            $leaderboard->update(array(
                'fullname' => $profile["fullname"],
                'regdno' => $profile["regdno"],
                'userid' => new MongoId($userid)
            ) , array(
                '$push' => array(
                    'coding_score' => $finalscore
                )
            ) , array(
                "upsert" => true
            ));
            $total = 0;
            $find = $leaderboard->find(array(
                "userid" => new MongoId($userid)
            ));
            foreach($find as $f)
                {
                $count = count($f["coding_score"]);
                for ($i = 0; $i < $count; $i++)
                    {
                    $total = array_sum($f["coding_score"]);
                    }
                }

            $leaderboard->update(array(
                'fullname' => $profile["fullname"],
                'regdno' => $profile["regdno"],
                'userid' => new MongoId($userid)
            ) , array(
                '$set' => array(
                    'coding_total' => $total
                )
            ));
            }

        return true;
        }
      else
        {
        echo "Something Went Wrong ||  Check your Network Connections";
        return false;
        }
    }
  else
    {
    echo "Test not valid";
    return false;
    }

?>