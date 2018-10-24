<?php
$optimal_score = 0;
$heuristic_array = array();

$dbConn = new mysqli("localhost" , "qoltoolx", "qolpass", "qoltoolx_qtool");

$get_heuristics_result = $dbConn->query("SELECT heuristic_id, demo_key, mag_pref, weight FROM heuristics");
while($heuristic_obj = $get_heuristics_result->fetch_object()){
    array_push($heuristic_array, $heuristic_obj);
}
$optimal_score += calc_heuristic_scores($heuristic_array, $dbConn);
$location_scores_array = get_location_scores_object($heuristic_array, $dbConn);
foreach($location_scores_array as $location_score){
    echo "$location_score->name scored $location_score->total_score out of a max of $optimal_score\n";
    $fit_index = $location_score->total_score / $optimal_score * 100;
    echo "$location_score->name has a fit index of $fit_index%";
}

function get_demo_val($demo_key, $location_id, $dbConn){
    $get_demo_key_stmt = $dbConn->prepare("SELECT val_format, value FROM demo_vals WHERE demo_key_id = ? AND location_id = ?");
    $get_demo_key_stmt->bind_param("ii", $demo_key, $location_id);
    $get_demo_key_stmt->execute();
    $get_demo_key_stmt->bind_result($val_format, $value);
    $get_demo_key_stmt->fetch();
    $get_demo_key_stmt->close();
    return $value;
}

function get_location_scores_object($heuristics_array, $dbConn){
    $locations_array = array();
    $get_locations_result = $dbConn->query("SELECT loc_id, name FROM locations");
    while($location_obj = $get_locations_result->fetch_object()){
        array_push($locations_array, $location_obj);
    }
    for($i = 0; $i < 3; $i++){
        $get_location_scores_stmt = $dbConn->query("SELECT heuristic_id, score FROM loc_heuristic_score WHERE loc_id = ".($i + 1));
        $location_score_array = array();
        $total_score = 0;
        while($score_object = $get_location_scores_stmt->fetch_object()){
            array_push($location_score_array, $score_object);
            $total_score += $score_object->score;
        }
        $locations_array[$i]->total_score = $total_score;
    }
    return $locations_array;
}

function write_heuristic_score($loc_id, $heuristic_id, $score, $dbConn){
    $write_heuristic_score_stmt = $dbConn->prepare("INSERT INTO loc_heuristic_score(loc_id, heuristic_id, score) VALUES (?, ?, ?)");
    $write_heuristic_score_stmt->bind_param("iid", $loc_id, $heuristic_id, $score);
    $write_heuristic_score_stmt->execute();
}

function calc_heuristic_scores($heuristic_array, $dbConn){
    $optimal_score = 0;
    foreach($heuristic_array as $heuristic){
        $heuristic_total = 0;
        $demo_val_array = array();
        for($i = 0; $i < 3; $i++){
            $demo_val = get_demo_val($heuristic->demo_key, $i + 1, $dbConn);
            $heuristic_total += $demo_val;
            array_push($demo_val_array, $demo_val);
        }
        $heuristic_average = $heuristic_total / 3;
        $heuristic_score_array = array();
        for($i = 0; $i < 3; $i++){
            $demo_val = $demo_val_array[$i];
            $devRat = ($demo_val - $heuristic_average) / (($demo_val + $heuristic_average) / 2);
            if($heuristic->mag_pref == -1 && $devRat < 0){
                //Adjust for wanting lower and negative value
                $devRat = $devRat * -1;
            }
            $heuristic_score = $heuristic->weight * $devRat * 100;
            array_push($heuristic_score_array, $heuristic_score);
        }
        $optimal_score += max($heuristic_score_array);
        for($i = 0; $i < 3; $i ++){
            write_heuristic_score($i + 1, $heuristic->heuristic_id, $heuristic_score_array[$i], $dbConn);
        }
    }
    return $optimal_score;
}