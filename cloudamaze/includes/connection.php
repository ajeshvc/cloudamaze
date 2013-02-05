<?php
$con = mysql_connect("localhost", "root", "admin");
if (!$con) {
    die('Could not connect: ' . mysql_error());
}

mysql_select_db("cloudamaze", $con);

?>
