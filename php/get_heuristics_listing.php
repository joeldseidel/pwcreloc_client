<?php
$dbConn = new mysqli("localhost" , "qoltoolx", "qolpass", "qoltoolx_qtool");
$get_heuristics_stmt = $dbConn->query("SELECT * FROM heuristics");
$heuristics_array = array();
while($heuristic_record = $get_heuristics_stmt->fetch_object()){
    $heuristic_obj = get_heuristic_obj($heuristic_record);
    array_push($heuristics_array, $heuristic_obj);
}
foreach($heuristics_array as $heuristic){
    echo "<tr>";
    echo "  <td>$heuristic->demo_key</td>";
    echo "  <td>$heuristic->mag_pref</td>";
    echo "  <td>$heuristic->weight</td>";
    echo "</tr>";
}

function get_heuristic_obj($heuristic_record){
    $this_heuristic = new stdClass();
    $demo_key_id = $heuristic_record->demo_key;
    $mag_pref = $heuristic_record->mag_pref;
    $weight = $heuristic_record->weight;
    $this_heuristic->mag_pref = ($mag_pref == 1) ? "Prefer Higher" : "Prefer Lower";
    $this_heuristic->weight = $weight;
    $this_heuristic->demo_key = get_demo_key_name($demo_key_id);
    return $this_heuristic;
}

function get_demo_key_name($demo_key_id){
    $dbConn = new mysqli("localhost" , "qoltoolx", "qolpass", "qoltoolx_qtool");
    $get_demo_key_name_stmt = $dbConn->query("SELECT * FROM demo_keys WHERE demo_key = ".$demo_key_id);
    $demo_key = $get_demo_key_name_stmt->fetch_object();
    return $demo_key->name;
}