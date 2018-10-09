<?php
require '../../app/common.php';
if ($_SERVER['REQUEST_METHOD']=='POST'){
require 'commentPost.php';
die;
}
// 1. Go to the database and get all teams
$teams = Team::fetchAll();
// 2. Convert to JSON
$json = json_encode($teams, JSON_PRETTY_PRINT);
// 3. Print
header('Content-Type: application/json');
echo $json;
