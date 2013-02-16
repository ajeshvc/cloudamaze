<?php
require_once '../config.php';
$connection = mysql_connect($db_host, $db_user, $db_password);
if (!$connection) {
    die('Could not connect: ' . mysql_error());
}

mysql_select_db($db_name, $connection);

?>
