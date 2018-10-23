<?php
$heuristic_array = array();

$get_heuristics_result = $dbConn->query("SELECT demo_key, mag_pref, weight FROM demo_vals");
while($heuristic_obj = $get_heuristics_result->fetch_object()){
    array_push($heuristic_array, $heuristic_obj);
}

$demo_val_array = array();
for($i = 0; $i < 3; $i++){
    $demo_val = get_demo_val($demo_key, $i + 1, $dbConn);
    array_push($demo_val_array, $demo_key);
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