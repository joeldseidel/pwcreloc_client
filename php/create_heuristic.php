<?php
$demo_key = $_GET['demo_key_select'];
$mag_pref = $_GET['preference'];
$weight = $_GET['weight_entry_select'];

$dbConn = new mysqli("localhost" , "qoltoolx", "qolpass", "qoltoolx_qtool");

create_heuristic_record($demo_key, $mag_pref, $weight, $dbConn);

header('Location: http://www.qoltool.x10.mx/');

function create_heuristic_record($demo_key, $mag_pref, $weight, $dbConn){
    $create_heuristic_stmt = $dbConn->prepare("INSERT INTO heuristics (demo_key, mag_pref, weight) VALUES (?, ?, ?)");
    $create_heuristic_stmt->bind_param("iii", $demo_key, $mag_pref, $weight);
    $create_heuristic_stmt->execute();
}