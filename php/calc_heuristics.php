<?php
$demo_val_array = array();
for($i = 0; $i < 3; $i++){
    $demo_val = get_demo_val($demo_key, $i + 1, $dbConn);
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