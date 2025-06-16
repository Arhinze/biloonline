<?php

include_once($_SERVER["DOCUMENT_ROOT"]."/php/static_variables.php");

$dbhost = "localhost";
$dbname = "u590828029_biloonline";
$dbuser = "u590828029_BiloAdmin";
$dbpass = "BiloAdmin@1!";

$pdo = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

?>