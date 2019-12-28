<?php

$root = $_SERVER['DOCUMENT_ROOT'];
$config = require_once($root . "/config.php");
require_once($root . "/db/sqli.php");
ini_set("display_errors", "1");
error_reporting(-1);

$sqli = new sqli($config['server'], $config['database'], $config['user'], $config['pass']);
$sqli->dbConnect();

