<?php
var_dump($_GET);
$demo_key = $_GET['demo_key_select'];
$mag_pref = $_GET['preference'];
$weight = $_GET['weight_entry_select'];

$dbConn = new mysqli("localhost" , "qoltoolx", "qolpass", "qoltoolx_qtool");

for($i = 0; $i < 3; $i++){
    $demo_val = get_demo_val($demo_key, $i, $dbConn);
}

function get_demo_val($demo_key, $location_id, $dbConn){
    $get_demo_key_stmt = $dbConn->prepare("SELECT val_format, value FROM demo_vals WHERE demo_key_id = ? AND location_id = ?");
    $get_demo_key_stmt->bind_param("ii", $demo_key, $location_id);
    $get_demo_key_stmt->execute();
    $get_demo_key_stmt->bind_result();
    $get_demo_key_stmt->fetch($val_format, $value);
    $get_demo_key_stmt->close();
    return $value;
}