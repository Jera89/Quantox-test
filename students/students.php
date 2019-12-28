<?php
ini_set("display_errors", "1");
error_reporting(-1);
require_once $_SERVER['DOCUMENT_ROOT'].'/common.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/models/Student.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/models/Grade.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/models/Board.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/helpers/Api.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/helpers/StudentStatisticsHelper.php';


$id  = $_REQUEST['id'];

$student = new Student($sqli);
$student->id = $id;
$student = $student->load();
$student->getGrades();
$student->getBoard();

$statistics_helper = new StudentStatisticsHelper($student);
$response = $statistics_helper->calculateStatistics();


header("Content-Type: application/json");
echo Api::response("", $response);

