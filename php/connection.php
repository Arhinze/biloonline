<?php
$dbhost = "localhost";
$dbname = "u590828029_biloonline";
$dbuser = "u590828029_BiloAdmin";
$dbpass = "BiloAdmin@1!";

$pdo = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

$site_name = "Bilo Online";
$token_name = "Bilo";
$site_url="https://biloonline.com";
$site_url_short="biloonline.com";

$site_color_dark = "#042c06";
$site_color_light = "#0bee3ccc";

define("SITE_NAME", "Bilo");
define("SITE_NAME_SHORT", "Bilo");
define("SITE_URL", "https://biloonline.com");
define("SITE_URL_SHORT", "biloonline.com");

date_default_timezone_set('Africa/Lagos');
ini_set("display_errors", '1');
?>