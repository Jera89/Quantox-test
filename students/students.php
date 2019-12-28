<?php
ini_set("display_errors", "1");
error_reporting(-1);
require_once $_SERVER['DOCUMENT_ROOT'].'/common.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/models/Student.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/models/Grade.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/models/Board.php';

$id  = $_REQUEST['id'];
echo $id;

